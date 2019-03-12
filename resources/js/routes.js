import AdminHome from './components/admins/AdminHome.vue';

//Organisation
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


        // Bureeau
        import BureauList from './components/admins/organisation/admin/Bureau.vue';
        import SingleBureau from './components/admins/organisation/admin/SingleBureau.vue';
        import HousehelpList from './components/admins/organisation/admin/Househelp.vue';
        import SingleHousehelp from './components/admins/organisation/admin/SingleHousehelp.vue';


//frontend public view
import Public from './components/public/About.vue';
import PublicSingleService from './components/public/PublicSingleService.vue';
import PublicSingleServiceModel from './components/public/PublicSingleServiceModel.vue';



// front filter default by categories
import GenderHousehelps from './components/public/standard/Househelp.vue';
import EducationHousehelps from './components/public/standard/Househelp.vue';
import DurationHousehelps from './components/public/standard/Househelp.vue';
import MaritalstatusHousehelps from './components/public/standard/Househelp.vue';
import ExperienceHousehelps from './components/public/standard/Househelp.vue';
import OperationHousehelps from './components/public/standard/Househelp.vue';
import SkillHousehelps from './components/public/standard/Househelp.vue';
import ReligionHousehelps from './components/public/standard/Househelp.vue';
import TribeHousehelps from './components/public/standard/Househelp.vue';






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

        //bureau
          {
            path: '/bureaus',
            component: BureauList
          },
          {
            path: '/bureau/:id',
            component: SingleBureau
          },
          {
            path: '/househelps', //all househelps
            component: HousehelpList
          },
          {
            path: '/househelp/:id',//view signle houshelp with her details
            component: SingleHousehelp
          },


// //Front End
 
//filter by category
 //gender
  {
    path:'/genderhousehelps/:id', ///public
    component: GenderHousehelps
  },
 //education
  {
    path:'/educationhousehelps/:id', ///public
    component: EducationHousehelps
  },
 //duration
  {
    path:'/durationhousehelps/:id', ///public
    component: DurationHousehelps
  },
 //maritalstatus
  {
    path:'/maritalstatushousehelps/:id', ///public
    component: MaritalstatusHousehelps
  },
 //experience
  {
    path:'/experiencehousehelps/:id', ///public
    component: ExperienceHousehelps
  },
 //operation
  {
    path:'/operationhousehelps/:id', ///public
    component: OperationHousehelps
  },
 //skill
  {
    path:'/skillhousehelps/:id', ///public
    component: SkillHousehelps
  },
 //religion
  {
    path:'/religionhousehelps/:id', ///public
    component: ReligionHousehelps
  },
 //tribe
  {
    path:'/tribehousehelps/:id', ///public
    component: TribeHousehelps
  },


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


