// get Anime Info dari Grabber
function getAnimeInfo(anime_id){
	var url = "api/grab-anime?id=" + anime_id;
	var type = "GET";
	var data = {};
	var beforeSendAction = function(){
		$("#generate_mal").val("Loading").attr('disabled', '');
	};
	var successAction = function(response){
		if(response.status === true){
      (function(){
        $.fn.hasValue = function(){
          if(this.val() != ""){
            this.siblings("label").addClass("has-val");
          }
        }
      })()
      $('[name="anime_title"]').val(response.anime_info.anime_title).hasValue();
      $('[name="anime_alternative"]').val(response.anime_info.japanese).hasValue();
      $('[name="anime_genre"]').val(response.anime_info.genre).hasValue();
      $('[name="anime_type"]').val(response.anime_info.type).hasValue();
      $('[name="anime_status"]').val(response.anime_info.status).hasValue();
      $('[name="anime_score"]').val(response.anime_info.score).hasValue();
      $('[name="anime_episode"]').val(response.anime_info.episode).hasValue();
      $('[name="anime_duration"]').val(response.anime_info.duration).hasValue();
      $('[name="anime_release"]').val(response.anime_info.aired).hasValue();
      $('[name="anime_trailer"]').val(response.anime_info.pv).hasValue();
      $('[name="anime_poster"]').val(response.anime_info.image).hasValue();
      $('.cover-pic img').attr("src", response.anime_info.image);
      $('[name="anime_sinopsis"]').val(response.anime_info.synopsis).hasValue();
      $('[name="anime_studios"]').val(response.anime_info.studio).hasValue();
      $("#generate_mal").val("Generate").removeAttr('disabled');
      
      var dataAlert = {
        alertType : "success",
        alertTitle : "Sukses!!",
        alertMessage : "Info Anime " +response.anime_info.anime_title+ " berhasil didapatkan ",
      }
      openAlert(dataAlert);
    } else {
      console.log(response);
      var message = response.responseJSON.pesan
      var dataAlert = {
        alertType : "danger",
        alertTitle : "Gagal!!",
        alertMessage : message,
      }
      openAlert(dataAlert);
      $("#generate_mal").val("Generate").removeAttr('disabled');
    }
  }
  var errorAction = function(response){
    console.log(response)
    var dataAlert = {
      alertType : "danger",
      alertTitle : "Gagal!!",
      alertMessage : "Grab tidak Jalan, cek konsol",
    }
    $("#addAnime").text("Add Anime").removeAttr('disabled');
    openAlert(dataAlert);
  }
	// get Grab info
	ajaxSendJSON(url, type, data, beforeSendAction, successAction, errorAction);
}
function grabber(){
	$("#generate_mal").on('click', function(){
		var anime_id = $("[name='anime_mal_id']").val();
		if(anime_id != "" || anime_id != null){
			getAnimeInfo(anime_id);
		}
	})
}

// add anime
function AddAnimeAction(){
	var url = "api/animes";
	var type = "POST";
	var anime_data = {
		anime_mal_id : $('[name="anime_mal_id"]').val(),
		anime_title : $('[name="anime_title"]').val(),
		anime_alternative : $('[name="anime_alternative"]').val(),
		anime_genre : $('[name="anime_genre"]').val(),
		anime_type : $('[name="anime_type"]').val(),
		anime_status : $('[name="anime_status"]').val(),
		anime_score : $('[name="anime_score"]').val(),
		anime_episode : $('[name="anime_episode"]').val(),
		anime_duration : $('[name="anime_duration"]').val(),
		anime_release : $('[name="anime_release"]').val(),
		anime_trailer : $('[name="anime_trailer"]').val(),
		anime_poster : $('[name="anime_poster"]').val(),
		anime_sinopsis : $('[name="anime_sinopsis"]').val(),
		anime_studios : $('[name="anime_studios"]').val(),
  }
  // console.log(anime_data)
	var beforeSendAction = function(){
		$("#addAnime").text("Loading").attr('disabled', '');
	}
	var successAction = function(response){
    if(response.status === true){
      var anime_title = response.anime_title
      var dataAlert = {
        alertType : "success",
        alertTitle : "Sukses!!",
        alertMessage : "Anime " +anime_title+ " berhasil ditambahkan kedalam database",
      }
      $("#addAnime").text("Add Anime").removeAttr('disabled');
      openAlert(dataAlert);
      // resetFormAction();
    } else {
      var message = response.responseJSON.pesan
      console.log(response);
      var dataAlert = {
        alertType : "danger",
        alertTitle : "Gagal!!",
        alertMessage : message,
      }
      $("#addAnime").text("Add Anime").removeAttr('disabled');
      openAlert(dataAlert);
    }
  }
  var errorAction = function(response){
    var message = response.responseJSON.pesan
    console.log(response)
    var dataAlert = {
      alertType : "danger",
      alertTitle : "Gagal!!",
      alertMessage : message,
    }
    $("#addAnime").text("Add Anime").removeAttr('disabled');
    openAlert(dataAlert);
  }

  if($('[name="anime_mal_id"]').val() == "" || $('[name="anime_title"]').val() == ""){
    openAlert({
      alertType : "warning",
      alertTitle : "Warning",
      alertMessage : "Tidak bisa mengirim form kosong",
    });
  } else {
    // send ajax
    ajaxSendJSON(url, type, anime_data, beforeSendAction, successAction, errorAction);
  }
}
function AddAnime(){
	$("#addAnime").on("click", function(){
		AddAnimeAction();
	})
}

// reset form
function resetFormAction(){
  (function(){
    $.fn.hasValue = function(){
      this.siblings("label").removeClass("has-val");
    }
  })()
  $('[name="anime_mal_id"]').val("").hasValue();
  $('[name="anime_title"]').val("").hasValue();
  $('[name="anime_alternative"]').val("").hasValue();
  $('[name="anime_genre"]').val("").hasValue();
  $('[name="anime_type"]').val("").hasValue();
  $('[name="anime_status"]').val("").hasValue();
  $('[name="anime_score"]').val("").hasValue();
  $('[name="anime_episode"]').val("").hasValue();
  $('[name="anime_duration"]').val("").hasValue();
  $('[name="anime_release"]').val("").hasValue();
  $('[name="anime_trailer"]').val("").hasValue();
  $('[name="anime_poster"]').val("").hasValue();
  $('.cover-pic img').attr("src", "https://cdn.myanimelist.net/images/anime/1993/93837.jpg");
  $('[name="anime_sinopsis"]').val("").hasValue();
  $('[name="anime_studios"]').val("").hasValue();
}
function resetForm(){
  $("#resetAnime").on("click", function(){
    resetFormAction();
  })
}

function posterCheker(){
	$('[name="anime_poster"]').on('change', function(){
		var url = $(this).val();
		$.ajax({
			url : JSON.stringify(url),
			success : function(){
				$('.cover-pic img').attr("src", $(this).val());				
			},
			error : function(error){
				console.log(error);
			}
		})
	})	
}


function animeListShowAction(){
  var url = "api/animes";
  var data = {};
  var type = "GET";
  var successAction = function(response){
    var status = response.status;
    var data = response.data;
    var htmlDOM = "";
    var tableHeadArray = ["No", "Poster", "MAL ID", "Title", "Type", "Score", "Genre", "Eps" ];
    var targetDOM = $("#animeListShow");

    if(status === true){
      htmlDOM += "<table class='play-data-table table-bordered table-sm'><thead>";
      htmlDOM +="<tr>"
        for(var i = 0; i < tableHeadArray.length; i++){
          htmlDOM += "<th>"+tableHeadArray[i]+"</th>";
        }
      htmlDOM += "</tr></thead>";
      htmlDOM += "<tbody>";
        var j = 1;
        for(var i = 0; i < data.length; i++){
          htmlDOM += "<tr>";
          htmlDOM += "<td>"+j+"</td>";
          htmlDOM += "<td class='p-1'><img width='100' height='130' src='"+data[i].anime_poster+"' /></td>";
          htmlDOM += "<td>"+data[i].anime_mal_id+"</td>";
          htmlDOM += "<td>"+data[i].anime_title+"</td>";
          htmlDOM += "<td>"+data[i].anime_type+"</td>";
          htmlDOM += "<td>"+data[i].anime_score+"</td>";
          htmlDOM += "<td>"+data[i].anime_genre+"</td>";
          htmlDOM += "<td>"+data[i].anime_episode+"</td>";
          htmlDOM += "</tr>";
          j++
        }
      htmlDOM += "</tbody></table>";
      targetDOM.html(htmlDOM);
      $('.play-data-table').DataTable({
        "paging":   false,
         "ordering": true,
         "info":     false
     })
    } else {
      openAlert({
        alertType : "error",
        alertTitle : "Error",
        alertMessage : response.responseJSON.pesan
      });
    }
  };
  var errorAction = function(response){
    openAlert({
      alertType : "error",
      alertTitle : "Error",
      alertMessage : response.responseJSON.pesan
    });
  };
  var beforeSendAction = function(response){

  };

  ajaxSendJSON(url, type, data, beforeSendAction, successAction, errorAction );
}

function animeListShow(){
  animeListShowAction();
}
function deleteAPLB(){
  $('.delete-play').on('click', function(){
    $(this).parent().parent().remove()
  });
}
function addAnimePlayListFormAction(){
  var aplf_htmlDOM = '<div class="aplf-block"><div class="form-group"><input class="form-control play-anime-title" type="text" name="anime_play_title" /><label>Eps Title</label></div><div class="form-group"><input class="form-control play-anime-link" type="text" name="anime_play_link" /><label>Player Link</label></div><div class="form-group text-right"><button class="btn btn-danger delete-play">Delete</button></div><div style="border-bottom:2px dashed #bbb;" class="mb-4"></div></div>'
  $('#animePlayListForm').append(aplf_htmlDOM);
  setTimeout(googleInputHasValue, 500 );
  deleteAPLB();
}

function addAnimePlayListForm(){
  $("#addAnimePlayList").on("click", function(){
    addAnimePlayListFormAction();
  })
}


function animeAddPlayListAction(){
  var url = "api/animes/playlist";
  var type = "POST";
  var arr_apl_title = [];
  var arr_apl_link = [];
  var emptyVal = 0;
  var successAction = function(response){
    console.log(response);
    openAlert({
      alertType : "success",
      alertTitle : "Berhasil",
      alertMessage : "Playlist berhasil ditambahkan"
    });
  }
  var beforeSendAction = function(){

  }
  var errorAction = function(response){

    console.log(response);
  }


  $('.play-anime-title').each(function(){
    var value = $(this).val();
    if(value == ""){
      emptyVal = 1;
    } else {
      arr_apl_title.push(value);
    }
  });
  
  $('.play-anime-link').each(function(){
    var value = $(this).val();
    if(value == ""){
      emptyVal = 1;
    } else {
    arr_apl_link.push(value);
    }
  });

 var apl_data = {
   anime_mal_id : $('[name="anime_mal_id"]').val(),
   apl_data : {
     apl_title : arr_apl_title,
     apl_link : arr_apl_link
   }
 }

 if(emptyVal == 1){
   openAlert({
     alertType : "warning",
     alertTitle : "Warning!!",
     alertMessage : "Lengkapi form Anime Play List"
   });
 } else {
  //  ajaxSendJSON()
  if($('[name="anime_mal_id"]').val() == ""){
    openAlert({
      alertType : "warning",
      alertTitle : "Warning!!",
      alertMessage : "Isi juga MAL IDnya"
    });
  } else {
    console.log(apl_data);
    ajaxSendJSON(url, type, apl_data, successAction, beforeSendAction, errorAction);
  }
 }
}

function animeAddPlayList(){
  $("#saveAnimePlayList").on("click", function(){
    animeAddPlayListAction();
  });
}

function showAPL(){
  
}

// DOKUMEN READY STATE
$(document).ready(function(){
	grabber();
  AddAnime();
  resetForm();
  animeListShow();
  addAnimePlayListForm();
  deleteAPLB();
  animeAddPlayList();
});