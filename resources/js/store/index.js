//standard
import countries from './modules/standard/countries';
import counties from './modules/standard/counties';
import constituencies from './modules/standard/constituencies';
import wards from './modules/standard/wards';
import genders from './modules/standard/genders';
import positions from './modules/standard/positions';
import relationships from './modules/standard/relationships';

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
//househelp standard
import duration from './modules/bureau/standard/duration';
import education from './modules/bureau/standard/education';
import englishstatus from './modules/bureau/standard/englishstatus';
import experience from './modules/bureau/standard/experience';
import kid from './modules/bureau/standard/kid';
import maritalstatus from './modules/bureau/standard/maritalstatus';
import operation from './modules/bureau/standard/operation';
import religion from './modules/bureau/standard/religion';
import skill from './modules/bureau/standard/skill';
import tribe from './modules/bureau/standard/tribe';

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
            //househelp standard
                duration,
                education,
                englishstatus,
                experience,
                kid,
                maritalstatus,
                operation,
                religion,
                skill,
                tribe,

            //client
                // client,


            //standard
                countries,
                counties,
                constituencies,
                wards,
                genders,
                positions,
                relationships,
            //universal
                about,
                advert,
                service,
                servicemodel,
                feature,
          },
        };

