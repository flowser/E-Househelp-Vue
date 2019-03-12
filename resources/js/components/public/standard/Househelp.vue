<template>
  <div id="househelp">
      <section>
         <FilterTopBar/>
      </section>
      <section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-md-2 col-lg-2 " style="padding-right: 0px; padding-left: 20px;width:13.66%" >
                    <!-- leftsidebar -->
                        <LeftSidebar/>
                    <!-- leftsidebar -->
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-md-10 col-lg-10 " style="padding-left: 0px; padding-right: 0px;">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Househelps</h2>
						<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" v-for="househelp in Househelps" :key="househelp.id"
                        style="padding-left: 6px; padding-right: 0px;">
                            <div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img class="card-img-top" :src="househelpLoadPassPhoto(househelp.photo)"
                                               style="width:100%; height:130px" alt="Card image cap">
											<a href="" style="color:#9a009a;">
                                                <i class="fa fa-info-circle"></i>View Househelp Details
                                            </a>
                                            <p>Work Experience: {{househelp.experience.name}}</p>
                                            <p>Kids: {{househelp.kid.name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Search Cart</a>
										</div>
								</div>
							</div>
						</div>
					</div><!--features_items-->

					 <RecommendedHousehelps/>
				</div>
			</div>
		</div>
    </section>

  </div>
</template>

<script>
import FilterTopBar from "./FilterTopBar.vue";
import LeftSidebar from "./LeftSidebar.vue";
import RecommendedHousehelps from "./RecommendedHousehelps.vue";

    export default {
       name:"Househelp",
        components:{
            FilterTopBar,
            LeftSidebar,
            RecommendedHousehelps,
        },
        mounted() {
            this.loadHousehelps();
        },
        computed:{
            Househelps(){
                return this.$store.getters.Househelps
            },
        },
        methods:{
            loadHousehelps(){
                 console.log('servicemodel fecth', this.$route.path)
                return this.$store.dispatch("househelps")
            },
            househelpLoadPassPhoto(househelp_photo){
                if(househelp_photo){
                    return "/assets/bureau/img/househelps/passports/"+househelp_photo;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
        },
    }
</script>
