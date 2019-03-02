<template>
    <!--BLOG AREA-->
    <section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12"  >
                    <div class="single-blog wow fadeIn" v-for="servicemodel in ServiceModelsbyServID" :key="servicemodel.id">
                        <div class="blog-image">
                            <div class="post-heading">
                                <h3>
                                    <router-link :to="`singleservicemodel/${servicemodel.id}`">
                                        {{servicemodel.title}}
                                    </router-link>
                                </h3>
                            </div>
                            <img :src="servicemodelLoadImage(servicemodel.image)"  alt="single service model">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta" style="background: #ffffff none repeat scroll 0 0; border-radius: 50px 50px 50px 50px;
                            left: 2px; position: absolute;top: -30px;width: 50px;">
                                <!-- <a href="#"> -->
                                    <img :src="organisationLoadLogo(Organisation.logo)" alt="" style="width:160px;">
                                <!-- </a> -->
                            </div>
                            <div class="post-date">
                                <a href="#">
                                    <i class="fa fa-calendar"></i>{{servicemodel.updated_at | dateformat}}
                                </a>
                            </div>
                            <p>{{servicemodel.details}}</p>
                            <!-- <p></p> -->
                            <router-link :to="`/pservicemodel/${servicemodel.id}`" class="read-more">Read More</router-link>
                        </div>
                    </div>
                </div>
                <!-- serviceside bar -->
                <ServiceSidebar/>
                <!-- service sidebar -->
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--BLOG AREA END-->
</template>

<script>
import ServiceSidebar from "./ServiceSidebar.vue"

    export default {
        name:"PublicSingleService",
        components:{
            ServiceSidebar
        },
        mounted() {
           this.servicemodels();
           this.loadOrganisation(); //for log in fa fa-ship replacement
        },
        computed:{
            ServiceModelsbyServID(){
               console.log('data fom by id', this.$store.getters.ServiceModelsbyServID)
               return this.$store.getters.ServiceModelsbyServID
            },
            Organisation(){
               return this.$store.getters.Organisation
            },
        },
        methods:{
            servicemodelLoadImage(servicemodel_image){
                if(servicemodel_image){
                    return "/assets/organisation/img/website/services/servicemodels/"+servicemodel_image;
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
            loadOrganisation(){
                return this.$store.dispatch( "organisation")//get all from organisation. organisation linked to user
            },
            servicemodels(){
                console.log('servicemodel fecth', this.$route.params.id)
                this.$store.dispatch('ServiceModelsByServiceID', this.$route.params.id);
            },
        },
        watch:{
            $route(to, from){
                this.servicemodels();
                this.loadOrganisation();//method
                this.organisationLoadLogo()
           }
        }
    }
</script>
