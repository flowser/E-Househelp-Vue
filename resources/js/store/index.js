//standard
import countries from './modules/standard/countries';
import counties from './modules/standard/counties';
import constituencies from './modules/standard/constituencies';
import wards from './modules/standard/wards';
import genders from './modules/standard/genders';
import positions from './modules/standard/positions';

//universal
import about from './modules/webpages/about';
import advert from './modules/webpages/advert';
import service from './modules/webpages/service';
import servicemodel from './modules/webpages/servicemodel';
import feature from './modules/webpages/feature';
//organisation
import organisation from './modules/organisation/organisation';
import permission from './modules/organisation/permission';
import role from './modules/organisation/role';
import user from './modules/organisation/user';
import orgdirector from './modules/organisation/director';
import orgadmin from './modules/organisation/admin';
import orgemployee from './modules/organisation/employee';
// bureau
import bureau from './modules/bureau/bureau';
import bureaudirector from './modules/bureau/bureaudirector';
import bureauadmin from './modules/bureau/bureauadmin';
import bureauemployee from './modules/bureau/bureauemployee';
import bureauhousehelp from './modules/bureau/bureauhousehelp';
import bureauclient from './modules/bureau/bureauclient';

        export default {
          modules: {
            //organisation
                organisation,
                orgdirector,
                orgadmin,
                orgemployee,
                // orghoushelp, //get all househelps
                user,
                permission,
                role,
            //bureau
                bureau,
                bureaudirector,
                bureauadmin,
                bureauemployee,
                bureauhousehelp,
                bureauclient,
            //househelp
                // househelp,

            //client
                // client,


            //standard
                countries,
                counties,
                constituencies,
                wards,
                genders,
                positions,
            //universal
                about,
                advert,
                service,
                servicemodel,
                feature,
          },
        };

