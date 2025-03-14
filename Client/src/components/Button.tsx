import React from "react";

const Button = ({
  children,
  ...props
}: React.PropsWithChildren<React.ButtonHTMLAttributes<HTMLButtonElement>>) => {
  return <button {...props}>{children}</button>;
};

export default Button;
