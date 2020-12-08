import Users from "pages/users";
import Home from "pages/home";
import Login from "pages/auth/Login";
import AuthLayout from "layouts/auth";
import MainLayout from "layouts/main";

const router = [
    {
        path: '/',
        component: Home,
        exact : true,
        layout : MainLayout,
    },
    {
        path: '/login',
        component: Login,
        layout : AuthLayout,
    },
    {
        path: '/users',
        component: Users,
        layout : AuthLayout,
    },
]

export default router;
