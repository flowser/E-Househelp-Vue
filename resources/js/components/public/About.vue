<template>
    <!--ABOUT DETAILS AREA-->
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12" style="left: 300px;">
                    <div class="area-title text-center wow fadeIn" style=" margin-bottom: 0px;">
                        <h2>{{About.title}}</h2>
                        <h4>{{About.subtitle}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="card border-0 " style="padding-left: 320px;">
                    <div class="card-body ">
                        <ul class="nav nav-pills" >
                            <li class="nav-item">
                                <a href="#about" class="nav-link" data-toggle="tab" title="About Company" aria-expanded="true">
                                    About Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#team" class="nav-link" data-toggle="tab" title="Team Members" aria-expanded="true">
                                    Team Members
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#services" class="nav-link" data-toggle="tab" title="Services" aria-expanded="true">
                                    Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#features" class="nav-link" data-toggle="tab" title="Features" aria-expanded="true">
                                    Features
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#adverts" class="nav-link" data-toggle="tab" title="Adverts" aria-expanded="true">
                                    Adverts
                                </a>
                            </li>
                        </ul>
                    </div>
                 </div>
            </div>
            <div class="row">
                 <div class="container-fluid">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="about">
                                <div class="row">
                                    <div class="card col-md-6 col-lg-6 col-sm-12 col-xs-12 border-0">
                                        <div class="card-body">
                                            <p>{{About.why_choose_us}}</p>
                                        </div>
                                    </div>
                                    <div class="card col-md-6 col-lg-6 col-sm-12 col-xs-12 border-0" style="border:opx">
                                        <div class="card-body">
                                            <img :src="aboutLoadFrontImage(About.front_image)"  alt="history">
                                            <!-- load -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card col-md-4 col-lg-4 col-sm-12 col-xs-12 border-0">
                                        <div class="card-body">
                                            <h3>Who We Are</h3>
                                            <p>{{About.who_we_are}}</p>
                                        </div>
                                    </div>
                                    <div class="card col-md-4 col-lg-4 col-sm-12 col-xs-12 border-0">
                                        <div class="card-body">
                                            <img :src="organisationLoadLogo(Organisation.logo)" alt="history">
                                        </div>
                                    </div>
                                    <div class="card col-md-4 col-lg-4 col-sm-12 col-xs-12 border-0">
                                        <div class="card-body">
                                            <h3>What We Do</h3>
                                            <p>{{About.what_we_do}}</p>
                                            <!-- <a href="#" class="read-more">Learn More</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="team">
                                <div class="row ">
                                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 d-flex" v-for="director in Organisation.organisationdirectors"  v-bind:key="director.id">
                                        <div class="card flex-fill" >
                                            <img class="card-img-top " :src="directorLoadPassPhoto(director.pivot.photo)" alt="member">
                                            <div class="card-body">
                                                <h3>{{director.full_name}}</h3>
                                                <p>{{director.position_name}}</p>
                                                    <ul class="social-bookmark">
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 d-flex" v-for="admin in Organisation.organisationadmins" v-bind:key="admin.id">
                                        <div class="card flex-fill" >
                                            <img class="card-img-top " :src="adminLoadPassPhoto(admin.pivot.photo)" alt="member">
                                        <div class="card-body">
                                                <h3>{{admin.full_name}}</h3>
                                                <p>{{admin.position_name}}</p>

                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 d-flex" v-for="employee in Organisation.organisationemployees"  v-bind:key="employee.id">
                                        <div class="card flex-fill" >
                                                <img class="card-img-top " :src="employeeLoadPassPhoto(employee.pivot.photo)" alt="member">
                                            <div class="card-body">
                                                <h3>{{employee.full_name}}</h3>
                                                <p>{{employee.position_name}}</p>
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="services">
                                <div class="row ">
                                     <div  v-for="service in Services" :key="service.id" class="d-flex col-md-4">
                                        <div class="card flex-fill border-0" >
                                                <img class="card-img-top " :src="serviceLoadImage(service.service_image)" style="width:100%; height:200px">
                                            <div class="card-body" >
                                                    <h5 class="card-title text-center">{{service.title}}</h5>
                                                <h6 class="card-title text-center">{{service.service_title}}</h6>
                                                <p style="margin-bottom:-0.5em" class="card-text">{{service.service_details }}</p>
                                            </div>
                                               <router-link  :to="`/pservice/${service.id}`" class="pull-right blue">More Models For this Service</router-link>
                                       </div>
                                    </div>
                                </div>
                            </div>
                             <div class="tab-pane" id="features">
                                 <div class="row">
                                     <div  v-for="feature in Features" :key="feature.id" class="card d-flex col-md-4 col-lg-4 col-sm-12 col-xs-12 border-0">
                                        <div class="card flex-fill" >
                                                <img class="card-img-top " :src="featureLoadImage(feature.image)" style="width:100%; ">
                                            <div class="card-body" >
                                                    <h5 class="card-title text-center">{{feature.title}}</h5>
                                                <p style="margin-bottom:-0.5em" class="card-text">{{feature.details }}</p>
                                            </div>
                                       </div>
                                    </div>
                                 </div>
                             </div>
                             <div class="tab-pane" id="adverts">
                                 <div class="row">
                                     <div  v-for="advert in Adverts" :key="advert.id" class="card d-flex col-md-4 col-lg-4 col-sm-12 col-xs-12 border-0">
                                        <div class="card flex-fill" >
                                                <img class="card-img-top " :src="advertLoadImage(advert.advert_image)" style="width:100%; ">
                                            <div class="card-body" >
                                                    <h5 class="card-title text-center">{{advert.title}}</h5>
                                                    <h6 class="card-title text-center">{{advert.subtitle}}</h6>
                                                <p style="margin-bottom:-0.5em" class="card-text">{{advert.details }}</p>
                                            </div>
                                       </div>
                                    </div>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT DETAILS AREA END-->
</template>


<script>
    export default {
        mounted() {
            this.loadOrganisation();
            this.loadAbout();
            this.loadServices();
            this.loadFeatures();
            this.loadServiceModels();
            this.loadAdverts();
        },
        computed:{
            Organisation(){
               return this.$store.getters.Organisation
            },
            Director(){
               return this.$store.getters.director//reminder to updater index
            },
            Admin(){
               return this.$store.getters.Admin//reminder to updater index
            },
            Employee(){
               return this.$store.getters.Employee//reminder to updater index
            },
            About(){
               return this.$store.getters.About
            },
            Services(){
               return this.$store.getters.Services
            },
            Features(){
               return this.$store.getters.Features
            },
            ServiceModels(){
               return this.$store.getters.ServiceModels
            },
            Adverts(){
               return this.$store.getters.Adverts
            },
        },
        methods:{
            loadOrganisation(){
                return this.$store.dispatch( "organisation")//get all from organisation. organisation linked to user
            },
            loadAbout(){
                return this.$store.dispatch( "about")
            },
            loadAdverts(){
                return this.$store.dispatch( "adverts")
            },
            loadServices(){
                return this.$store.dispatch( "services")
            },
            loadFeatures(){
                return this.$store.dispatch( "features")
            },
            loadServiceModels(){
                return this.$store.dispatch( "servicemodels")
            },


            aboutLoadFrontImage(front_image_id){
                if(front_image_id){
                    return "/assets/organisation/img/website/frontimage/"+front_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            organisationLoadLogo(logo_id){
                 if(logo_id){
                    return "assets/organisation/img/logo/"+logo_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            directorLoadPassPhoto(directorpivot_photo){
                if(directorpivot_photo){
                    return "/assets/organisation/img/directors/passports/"+directorpivot_photo;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            adminLoadPassPhoto(adminpivot_photo){
                if(adminpivot_photo){
                    return "/assets/organisation/img/admins/passports/"+adminpivot_photo;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            employeeLoadPassPhoto(employeepivot_photo){
                if(employeepivot_photo){
                    return "/assets/organisation/img/employees/passports/"+employeepivot_photo;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            featureLoadImage(image_id){
                if(image_id){
                    return "/assets/organisation/img/website/features/"+image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            serviceLoadImage(image_id){
                if(image_id){
                    return "/assets/organisation/img/website/services/"+image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            advertLoadImage(advert_image){
                if(advert_image){
                    return "/assets/organisation/img/website/adverts/"+advert_image;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },

        },
         watch:{
            $route(to, from){
                this.loadOrganisation();
           }
        }
    }
</script>
