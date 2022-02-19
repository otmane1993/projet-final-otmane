import React from 'react'
import { Outlet,Navigate } from 'react-router-dom';
const useAuth=()=>{
  const token=localStorage.getItem('token');
  return token;
}
function ProtectedRoutes() {
  const isAuth=useAuth();
  return isAuth?<Outlet/>:<Navigate to="/login"/>
}
export default ProtectedRoutes;