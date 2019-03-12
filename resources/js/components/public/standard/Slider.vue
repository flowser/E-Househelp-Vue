<template>
  <div id="slider">
     <section id="slider" style="padding-top: 88px;"><!--slider-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12" style="padding-left: 20px; padding-right: 20px;">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-Househelp</h1>
									<h2>E-Househelp Search</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="front_theme2/images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="front_theme2/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
                                        <h1><span>E</span>-Househelp</h1>
                                        <h2>E-Househelp Search</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="front_theme2/images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="front_theme2/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
                                        <h1><span>E</span>-Househelp</h1>
                                        <h2>E-Househelp Search</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="front_theme2/images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="front_theme2/images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->
  </div>
</template>

<script>
    export default {
        name:"Slider",
        mounted() {
            console.log('slider')
        }
    }
</script>
 