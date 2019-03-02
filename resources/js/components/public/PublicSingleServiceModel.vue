<template>
    <!--BLOG AREA-->
           <section class="blog-area blog-page section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="single-blog wow fadeIn">
                            <div class="blog-image">
                                <div class="post-heading">
                                    <h3> {{SingleServiceModel.title}}</h3>
                                </div>
                                <img :src="servicemodelLoadImage(SingleServiceModel.image)" alt="">
                            </div>
                            <div class="blog-details">
                                <div class="blog-meta" style="background: #ffffff none repeat scroll 0 0; border-radius: 50px 50px 50px 50px;
                                        left: 2px; position: absolute;top: -30px;width: 50px;">
                                <!-- <a href="#"> -->
                                    <img :src="organisationLoadLogo(Organisation.logo)" alt="" style="width:160px;">
                                </div>
                                <div class="post-date">
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>{{SingleServiceModel.updated_at | dateformat}}
                                    </a>
                                </div>
                                <p>{{SingleServiceModel.details}}</p>
                                <div class="bottom-article">
                                    <ul class="meta-post">
                                        <li v-if="SingleServiceModel.user"><i class="icon-user"></i><a href="#"> {{SingleServiceModel.user.full_name}}</a></li>
                                        <li v-if="SingleServiceModel.category"><i class="icon-tags"></i><a href="#">{{SingleServiceModel.service.title}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="comments-area">
                            <h4>02 Comment</h4>
                            <ul>
                                <li>
                                    <div class="comments-author-thumb">
                                        <img src="img/blog/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="commment-details">
                                        <div class="author-name-and-date">
                                            <h5>Nity Paru</h5>
                                            <p>20 January, 2015</p>
                                        </div>
                                        <div class="comment-text">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                        </div>
                                        <a href="#" class="replay-link">Replay</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="comments-author-thumb">
                                        <img src="img/blog/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="commment-details">
                                        <div class="author-name-and-date">
                                            <h5>Nity Paru</h5>
                                            <p>20 January, 2015</p>
                                        </div>
                                        <div class="comment-text">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                        </div>
                                        <a href="#" class="replay-link">Replay</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="comments-author-thumb">
                                        <img src="img/blog/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="commment-details">
                                        <div class="author-name-and-date">
                                            <h5>Nity Paru</h5>
                                            <p>20 January, 2015</p>
                                        </div>
                                        <div class="comment-text">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                        </div>
                                        <a href="#" class="replay-link">Replay</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="comments-form-area">
                            <h4>Leave A Comment</h4>
                            <form action="#" class="comment-form">
                                <p class="half-width"><input type="text" name="comment-name" id="comment-name" placeholder="Your Name"><input class="pull-right" type="email" name="comment-email" id="comment-email" placeholder="Your Email"></p>
                                <p><textarea name="comment-text" id="comment-text" cols="30" rows="4" placeholder="Your Comments"></textarea></p>
                                <button type="submit">Post Comment</button>
                            </form>
                        </div> -->
                    </div>
                     <!-- serviceside bar -->
                    <ServiceSidebar/>
                    <!-- service sidebar -->
                </div>
            </div>
        </section>


    <!--BLOG AREA END-->
</template>

<script>
import ServiceSidebar from "./ServiceSidebar.vue"

    export default {
        data(){
            return{
                singleservicemode:true,
            }
        },
        name:"SingleServiceModel",
        components:{
            ServiceSidebar
        },
        mounted() {
            this.singleservicemodel()//a// service models per the current service id
            this.loadOrganisation();
        },
        computed:{
            SingleServiceModel(){
                return this.$store.getters.SingleServiceModel
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
            singleservicemodel(){
                this.$store.dispatch('ServiceModelById', this.$route.params.id);//action
            },
        },
        watch:{
            $route(to, from){
                this.singleservicemodel(); //the method to servicemodels by service id
                this.loadOrganisation();//method
                this.organisationLoadLogo();
           }
        }
    }
</script>
