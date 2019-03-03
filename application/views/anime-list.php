<?php include 'head.php';?>
<!-- breadcrumbs -->
<div class="col-12 col-sm-12 col-md-12 col-lg-12">
   <div class="breadcrumbs">
      <ul>
         <li><a href="dashboard">Home</a></li>
         /
         <li class="current"><a href="#">Anime List</a></li>
      </ul>
   </div>
</div>
<!-- breadcrumbs -->
<!-- content-->
<div id="parent" class="col-12 col-sm-12 col-md-12 col-lg-12">
   <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-8">
         <div class="flat-card mb-4">
            <div class="flat-card-header">
               <h4 class="flat-card-title">Add Anime</h4>
            </div>
            <div class="flat-card-body">
							<div>
								
								<div class="row">
									<div class="col-12 col-sm-12 col-md-8 col-lg-8">
										<div class="form-group">
											<input type="text" class="form-control" name="anime_mal_id" value="" />
											<label>Input MAL ID</label>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-4 col-lg-4">
										<div class="form-group">
											<input id="generate_mal" type="button" class="btn btn-block btn-primary" value="Generate" /> 
										</div>
									</div>

									<div class="col-12 col-sm-12 col-md-8 col-lg-8">
										<div class="form-group">
											<input type="text" class="form-control" name="anime_title" value="" />
											<label>Judul Anime</label>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="anime_alternative" value="" />
											<label>Judul Alternative</label>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="anime_genre" value="" />
											<label>Genre</label>
										</div>
										<div class="row">
											<div class="col-12 col-sm-6 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_type" value="" />
													<label>Tipe</label>
												</div>
											</div>
											<div class="col-12 col-sm-6 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_status" value="" />
													<label>Status</label>
												</div>
											</div>
											<div class="col-12 col-sm-6 col-md-4 col-lg-4">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_score" value="" />
													<label>Skor</label>
												</div>
											</div>
											<div class="col-12 col-sm-6 col-md-4 col-lg-4">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_episode" value="" />
													<label>Jum eps</label>
												</div>
											</div>
											<div class="col-12 col-sm-6 col-md-4 col-lg-4">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_duration" value="" />
													<label>Durasi</label>
												</div>
											</div>
											<div class="col-12 col-sm-6 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_release" value="" />
													<label>Rilis</label>
												</div>
											</div>
											<div class="col-12 col-sm-6 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_trailer" value="" />
													<label>Trailer</label>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<input type="text" class="form-control" name="anime_poster" value="" />
													<label>Poster</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-4 col-lg-4">
										<div class="cover-pic form-group">
											<img class="w-100" src="https://cdn.myanimelist.net/images/anime/1993/93837.jpg" />
										</div>
									</div>


								</div>
								<textarea name="anime_sinopsis" id="sinop">Ketik sinopsis disini!</textarea>
							</div>
            </div>
         </div>
      </div>
      <!--SIDE NOTIF-->
      <div class="col-12 col-sm-12 col-md-6 col-lg-4">
        <div class="flat-card">
   <div class="flat-card-header">
      <h4 class="flat-card-title">My Notice</h4>
   </div>
   <div class="flat-card-body">
      <div class="notice-board">
         <ul class="notice-board-list">
            <li>
               <div class="notice-list-item">
                  <div class="notice-list-header">
                     <span class="notice-list-date">16 May 2017</span>
                     <span class="notice-list-arrive">5 min ago</span>
                  </div>
                  <h5 class="notice-list-title">Notice Title Here</h5>
                  <p class="notice-list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae erat a nisl venenatis pellentesque.</p>
               </div>
            </li>
         </ul>
      </div>
   </div>
</div>
      </div>
   </div>
</div>
<!-- content -->
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script>
function getAnimeInfo(anime_id){
	// for production
	var mal_url = "https://myanimelist.net/anime/";
	$.ajax({
		url : "get-anime?id=" + mal_url + anime_id,
		crossDomain: true,
		type: 'GET',
		beforeSend : function(){
			// alert("tunggu bentar");
		},
		success : function(anime_data){
			console.log(anime_data);
			// alert("Berhasil");
			(function(){
				$.fn.hasValue = function(){
					this.siblings("label").addClass("has-val");
				}
			})()

			$('[name="anime_title"]').val(anime_data.anime_title).hasValue();
			$('[name="anime_alternative"]').val(anime_data.japanese).hasValue();
			$('[name="anime_genre"]').val(anime_data.genre).hasValue();
			$('[name="anime_type"]').val(anime_data.type).hasValue();
			$('[name="anime_status"]').val(anime_data.status).hasValue();
			$('[name="anime_score"]').val(anime_data.score).hasValue();
			$('[name="anime_episode"]').val(anime_data.episode).hasValue();
			$('[name="anime_duration"]').val(anime_data.duration).hasValue();
			$('[name="anime_release"]').val(anime_data.aired).hasValue();
			$('[name="anime_trailer"]').val(anime_data.pv).hasValue();
			$('[name="anime_poster"]').val(anime_data.image).hasValue();
			$('.cover-pic img').attr("src", anime_data.image);
			// $('[name="anime_sinopsis"]').val(anime_data.synopsis);
			// tinymce.init({ selector:'textarea' });
			tinyMCE.activeEditor.setContent(anime_data.synopsis);
			
		}
	})
}

function grabber(){
	$("#generate_mal").on('click', function(){
		var anime_id = $("[name='anime_mal_id']").val();
		if(anime_id != "" || anime_id != null){
			getAnimeInfo(anime_id);
		}
	})
}

$(document).ready(function(){
	grabber();
})
</script>
<?php include 'footer.php';?>