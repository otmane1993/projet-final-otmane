import React from 'react'
import { Outlet,Navigate } from 'react-router-dom';
const useAuth=()=>{
  const token=localStorage.getItem('token');
  return token;
}
function ProtectedAuth() {
  const isAuth=useAuth();
  return isAuth?<Navigate to="/"/>:<Outlet/>
}
export default ProtectedAuth;