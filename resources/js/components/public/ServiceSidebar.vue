<template>
    <!--BLOG AREA-->
        <!-- serviceside bar -->
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
            <div class="sidebar-area wow fadeIn">
                        <div class="single-sidebar-widget widget_search">
                            <h4>Search</h4>
                            <form action="#">
                                <input @keyup="RealSearch" v-model="keyword" type="text" class="input-medium search-query">
                                <button type="submit" @click.prevent="RealSearch"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="single-sidebar-widget widget_categories">
                            <h4>Services</h4>
                            <ul >
                                <li v-for="service in Services" :key="service.id"  v-if="service.servicemodels.length>0">
                                    <router-link :to="`/pservices/${service.id}`">{{service.title}}</router-link>
                                    <span>({{service.servicemodels.length}})</span>
                                </li>

                                <!-- <li><a href="#">Air Freight</a></li>
                                <li><a href="#">Sea Freight</a></li>
                                <li><a href="#">Ware House Freight</a></li>
                                <li><a href="#">Rail Freight</a></li> -->
                            </ul>
                        </div>
                        <div class="single-sidebar-widget widget_recent_entries">
                            <h4>Latest Service Models</h4>
                            <ul>
                                <li v-for="(servicemodel, index) in ServiceModels" :key="servicemodel.id" v-if="index <5">
                                    <div class="alignleft">
                                        <img :src="servicemodelLoadImage(servicemodel.image)" alt="latest" class="pull-left" width="70" >
                                    </div>
                                    <h6>
                                        <router-link :to="`/pservicemodel/${servicemodel.id}`" >{{servicemodel.title}}</router-link>
                                    </h6>
                                    <p>
                                    {{servicemodel.details | sortlength(100, "....")}}
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="single-sidebar-widget widget_tag_cloud">
                            <h4>Pupular Tags</h4>
                            <div class="tagcloud">
                                <a href="#">Design</a>
                                <a href="#">Transport</a>
                                <a href="#">Cargo</a>
                                <a href="#">Freight</a>
                                <a href="#">Logistic</a>
                                <a href="#">Truck</a>
                                <a href="#">Shipping</a>
                                <a href="#">ware house</a>
                            </div>
                        </div> -->
                    </div>

        </div>
        <!-- service sidebar -->
    <!--BLOG AREA END-->
</template>


<script>
import _ from 'lodash'

    export default {
        name:"ServiceSidebar",
        data(){
            return{
                keyword:''
            }
        },
        computed:{
            Services(){
                return this.$store.getters.Services;
            },
            ServiceModels(){
                return this.$store.getters.LatestServiceModels;
            },
        },
        mounted() {
            this.loadServiceModels();

            this.$store.dispatch('services');
            this.$store.dispatch('LatestServiceModelsByServiceID');
        },
        methods:{
            RealSearch:_.debounce(function () {
                    this.$store.dispatch('SearchServiceModel', this.keyword); //action from index.js
            }, 20),
             servicemodelLoadImage(servicemodel_image){
                if(servicemodel_image){
                    return "/assets/organisation/img/website/services/servicemodels/"+servicemodel_image;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            loadServiceModels(){
                     return this.$store.dispatch("LatestServiceModels")
            },
        }
    }
</script>
