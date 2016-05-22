@extends('layouts.master')

@section('content')

<div class="col-md-8 pull-right" id="content">
	<!-- To Top -->
	<i class="fa fa-arrow-up fa-2x totop-btn"></i>
	<!-- Search Form -->
	<div class="search-form">
		<form action="" method="get">
			<div class="input-group search-group">
			  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
			  <input name="q" type="search" class="form-control search-in" placeholder="Type keyword here...">
			</div>
		</form>
	</div>
	<ul class="tab-panel">
		<li class="menu posts active">Posts</li>
		<li class="menu categories">Categories</li>
		<li class="search"><i class="fa fa-search search-btn"></i></li>
	</ul>
	<div class="tab-content">
		<div id="posts" class="box-content">
			<section>
				<div class="post">
					<div class="post-author">
						<img class="img-circle img-responsive" src="images/profile.jpg">
					</div>
					<div class="post-content">
						<header>
							<a href="#">Lorem ipsum dolor</a>
						</header>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo architecto quaerat, non fugiat eos aspernatur repellat voluptate, rerum blanditiis provident dolore nesciunt optio aliquid, reprehenderit reiciendis, voluptatibus corrupti voluptatem sequi!</p>
						<p class="post-foot">
							<a href="#">Nur Muhammad</a> in <a href="#">Travel</a> / April 20, 2016
						</p>
					</div>
				</div>
			</section>
			<section>
				<div class="post">
					<div class="post-author">
						<img class="img-circle img-responsive" src="images/profile.jpg">
					</div>
					<div class="post-content">
						<header>
							<a href="#">Lorem ipsum dolor</a>
						</header>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo architecto quaerat, non fugiat eos aspernatur repellat voluptate, rerum blanditiis provident dolore nesciunt optio aliquid, reprehenderit reiciendis, voluptatibus corrupti voluptatem sequi!</p>
						<p class="post-foot">
							<a href="#">Nur Muhammad</a> in <a href="#">Travel</a> / April 20, 2016
						</p>
					</div>
				</div>
			</section>
			<section>
				<div class="post">
					<div class="post-author">
						<img class="img-circle img-responsive" src="images/profile.jpg">
					</div>
					<div class="post-content">
						<header>
							<a href="#">Lorem ipsum dolor</a>
						</header>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo architecto quaerat, non fugiat eos aspernatur repellat voluptate, rerum blanditiis provident dolore nesciunt optio aliquid, reprehenderit reiciendis, voluptatibus corrupti voluptatem sequi!</p>
						<p class="post-foot">
							<a href="#">Nur Muhammad</a> in <a href="#">Travel</a> / April 20, 2016
						</p>
					</div>
				</div>
			</section>
			<section>
				<div class="post">
					<div class="post-author">
						<img class="img-circle img-responsive" src="images/profile.jpg">
					</div>
					<div class="post-content">
						<header>
							<a href="#">Lorem ipsum dolor</a>
						</header>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo architecto quaerat, non fugiat eos aspernatur repellat voluptate, rerum blanditiis provident dolore nesciunt optio aliquid, reprehenderit reiciendis, voluptatibus corrupti voluptatem sequi!</p>
						<p class="post-foot">
							<a href="#">Nur Muhammad</a> in <a href="#">Travel</a> / April 20, 2016
						</p>
					</div>
				</div>
			</section>
			
		</div>
		<div id="categories" class="box-content">

			<div class="row">
			    <div class="col-sm-4 col-xs-6">
			    	<a href="#" class="cat-link">
			    		<div class="category">
							<h3>Geek</h3>
							<p>3 posts</p>
							<img src="images/profile.jpg" alt="Category" class="cat-img">
				    	</div>
			    	</a>
			    </div>
			    <div class="col-sm-4 col-xs-6">
			    	<a href="#" class="cat-link">
			    		<div class="category">
							<h3>Geek</h3>
							<p>3 posts</p>
							<img src="images/profile.jpg" alt="Category" class="cat-img">
				    	</div>
			    	</a>
			    </div>
			    <div class="col-sm-4 col-xs-6">
			    	<a href="#" class="cat-link">
			    		<div class="category">
							<h3>Geek</h3>
							<p>3 posts</p>
							<img src="images/profile.jpg" alt="Category" class="cat-img">
				    	</div>
			    	</a>
			    </div>
			    <div class="col-sm-4 col-xs-6">
			    	<a href="#" class="cat-link">
			    		<div class="category">
							<h3>Geek</h3>
							<p>3 posts</p>
							<img src="images/profile.jpg" alt="Category" class="cat-img">
				    	</div>
			    	</a>
			    </div>
			    <div class="col-sm-4 col-xs-6">
			    	<a href="#" class="cat-link">
			    		<div class="category">
							<h3>Geek</h3>
							<p>3 posts</p>
							<img src="images/profile.jpg" alt="Category" class="cat-img">
				    	</div>
			    	</a>
			    </div>
			    <div class="col-sm-4 col-xs-6">
			    	<a href="#" class="cat-link">
			    		<div class="category">
							<h3>Geek</h3>
							<p>3 posts</p>
							<img src="images/profile.jpg" alt="Category" class="cat-img">
				    	</div>
			    	</a>
			    </div>
			</div>
		</div> <!-- #categories -->
	</div> <!-- .tab-content -->

	<footer>
		<p align="center">Copyright &copy; 2016 <a href="#">Nur Muhammad</a></p>
	</footer>
</div>

@endsection