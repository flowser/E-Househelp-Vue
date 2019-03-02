import AdminHome from './components/admins/AdminHome.vue';

//org superadmin
//org Directors
import DirectorList from './components/admins/organisation/superadmin/directors/Directors.vue';
//org Admins
import AdminList from './components/admins/organisation/superadmin/admins/Admins.vue';
//org Employees
import EmployeeList from './components/admins/organisation/superadmin/Employees/Employees.vue';

//Permission
import PermissionList from './components/admins/organisation/superadmin/permission/List.vue';
//role
import RoleList from './components/admins/organisation/superadmin/role/List.vue';
//user
import UserList from './components/admins/organisation/superadmin/user/List.vue';
//Organisation settings
import Orgsetting from './components/admins/organisation/Organisation.vue';

//single about image full more
import SingleAboutImage from './components/admins/organisation/SingleAboutPic.vue';

//Single Advert read more
import SingleAdvert from './components/admins/organisation/SingleAdvert.vue';

//Single Service read more
import SingleService from './components/admins/organisation/SingleService.vue';




//frontend public view
import Public from './components/public/About.vue';
import PublicSingleService from './components/public/PublicSingleService.vue';
import PublicSingleServiceModel from './components/public/PublicSingleServiceModel.vue';






export const routes = [
    {
      path: '/home',
      component: AdminHome
    },
    //organisation
    //directors
    {
      path: '/orgdirectors',
      component: DirectorList
    },
    //admins
    {
      path: '/orgadmins',
      component:AdminList
    },
    //employees
    {
      path: '/orgemployees',
      component:EmployeeList
    },

    //Permisions
    {
      path: '/permissions',
      component: PermissionList
    },

    //Roles
    {
      path: '/roles',
      component: RoleList
    },

    //Users
    {
      path: '/users',
      component:UserList
    },
    //Organisation Settings
    {
      path: '/settings',
      component:Orgsetting
    },
//about pic more
    {
      path:'/aboutimage/:id',
      component: SingleAboutImage
    },
//advert read more
    {
      path:'/advert/:id',
      component: SingleAdvert
    },
//service read more
    {
      path:'/service/:id',
      component: SingleService
    },


// //Front End
  {
    path:'/pub', ///public
    component: Public
  },
  {
    path:'/pservice/:id',
    component: PublicSingleService
  },
  {
    path:'/pservicemodel/:id', ///public
    component: PublicSingleServiceModel
  },
  {
    path:'/pservices/:id',
    component: PublicSingleService
  },



];


