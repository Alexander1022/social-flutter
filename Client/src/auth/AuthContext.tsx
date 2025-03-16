import React, { createContext, useContext, useEffect, useState, ReactNode } from 'react';
import axios from 'axios';

export interface User {
    name: string;
    email: string;
    xp: number;
}

interface AuthContextType {
    user: User | null;
    isAuthenticated: boolean;
    isLoading: boolean; 
    logout: () => void;
    login: (token: string) => Promise<void>;
    updateUser: (updates: Partial<User>) => void;
}

const AuthContext = createContext<AuthContextType>({
    user: null,
    isAuthenticated: false,
    isLoading: true,
    logout: () => {},
    login: async () => {},
    updateUser: () => {},
});

interface AuthProviderProps {
    children: ReactNode;
}

export const AuthProvider: React.FC<AuthProviderProps> = ({ children }) => {
    const [user, setUser] = useState<User | null>(null);
    const [isAuthenticated, setIsAuthenticated] = useState<boolean>(false);
    const [isLoading, setIsLoading] = useState<boolean>(true);

    const loadUser = async (token?: string) => {
        setIsLoading(true);
        const authToken = token || localStorage.getItem('authToken');
        if (!authToken) {
            setIsAuthenticated(false);
            setUser(null);
            setIsLoading(false);
            return;
        }

        try {
            const response = await axios.get<User>(`${import.meta.env.VITE_SERVER_ENDPOINT}/api/user`, {
                headers: {
                    Authorization: `Bearer ${authToken}`,
                    'Access-Control-Allow-Credentials': true,
                    'ngrok-skip-browser-warning': 'please-ngrok-we-love-you'
                },
            });

            const userData: User = {
                ...response.data,
            };

            setUser(userData);
            setIsAuthenticated(true);
            if (!token) localStorage.setItem('authToken', authToken);
        } catch (error) {
            console.error('Failed to load user', error);
            setUser(null);
            setIsAuthenticated(false);
        } finally {
            setIsLoading(false);
        }
    };

    useEffect(() => {
        loadUser();
    }, []);

    const login = async (token: string) => {
        localStorage.setItem('authToken', token);
        await loadUser(token);
    };

    const logout = () => {
        localStorage.removeItem('authToken');
        localStorage.removeItem('user');
        setUser(null);
        setIsAuthenticated(false);
    };

    const updateUser = (updates: Partial<User>) => {
        setUser(prevUser => {
            if (!prevUser) return null;
            return { ...prevUser, ...updates };
        });
    };

    return (
       <AuthContext.Provider value={{ 
        user, 
        isAuthenticated, 
        isLoading,
        logout,
        login,
        updateUser
        }}>
            {children}
        </AuthContext.Provider>
    );
};

export const useAuth = (): AuthContextType => {
    return useContext(AuthContext);
};