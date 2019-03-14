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
									<div class="col-12 col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" name="anime_release" value="" />
											<label>Rilis</label>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" name="anime_studios" value="" />
											<label>Studio</label>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
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
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<textarea style="resize:none; min-height: 150px" class="form-control" name="anime_sinopsis" id="sinop"></textarea>
									<label>Sinopsis</label>
								</div>
							</div>
						</div>
						<!-- <textarea name="anime_sinopsis" id="sinop">Ketik sinopsis disini!</textarea> -->
					</div>
				</div>
				<div class="flat-card-footer">
					<div class="w-100">
						<button type="button" class="btn btn-primary" id="addAnime" disabled>Add Anime</button>
						<button type="button" class="btn btn-danger" id="resetAnime">Reset</button>
					</div>
				</div>
			</div>
		</div>
		<!--SIDE NOTIF-->
		<div class="col-12 col-sm-12 col-md-6 col-lg-4">
			<div class="flat-card mb-4">
				<div class="flat-card-header" data-toggle="collapse" data-target="#animePlayListBody">
					<h4 class="flat-card-title">Add Player List</h4>
				</div>
				<div id="animePlayListBody" class="collapse show">
					<div class="flat-card-body"  style="max-height:300px; overflow-y:auto">
						<div id="animePlayListForm">
							<div class="aplf-block">
								<div class="form-group">
									<input class="form-control play-anime-title" type="text" name="anime_play_title" />
									<label>Eps Title</label>
								</div>
								<div class="form-group">
									<input class="form-control play-anime-link" type="text" name="anime_play_link" />
									<label>Player Link</label>
								</div>
								<div class="form-group text-right">
									<button class="btn btn-danger delete-play">Delete</button>
								</div>
								<div style="border-bottom:2px dashed #bbb;" class="mb-4"></div>
								
							</div>
						</div>
					</div>
					<div class="flat-card-footer">
						<div class="text-right">
							<button class="btn btn-primary" id="addAnimePlayList">Add</button>
							<button class="btn btn-primary" id="saveAnimePlayList">Save</button>
						</div>
					</div>
				</div>
			</div>

			<div class="flat-card">
				<div class="flat-card-header" data-toggle="collapse" data-target="#PlayListBody">
					<h4 class="flat-card-title">Add Player List</h4>
				</div>
				<div id="PlayListBody" class="collapse show">
					<div class="flat-card-body">
						<div id="playListShow" class="table-responsive">
						
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
			<div class="flat-card">
				<div class="flat-card-header" data-toggle="collapse" data-target="#animeListBody">
					<h4 class="flat-card-title">Anime List</h4>				
				</div>
				<div id="animeListBody" class="collapse show">
					<div class="flat-card-body">
						<div id="animeListShow" class="table-responsive">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- content -->
<script type="text/javascript">
	$("#saveAnimePlayList").click(function(){
$("#addAnime").removeAttr('disabled')

});
</script>
<script src="assets/js/anime-list.js"></script>