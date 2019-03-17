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
      animeListShow();
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
  $('#editAnime').hide();
  $('#addAnime').show();
  $('#generate_mal').val('Generate').removeAttr('disabled');
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
    console.log(response)
    var status = response.status;
    var data = response.data;
    var htmlDOM = "";
    var tableHeadArray = ["No", "MAL ID", "Title", "Type", "Score", "Genre", "Eps" ];
    var targetDOM = $("#animeListShow");

    if(status === true){
      htmlDOM += "<table class='play-data-table table-hover'><thead class='bg-dark'>";
      htmlDOM +="<tr style='color:#fff;text-align:center'>"
        for(var i = 0; i < tableHeadArray.length; i++){
          htmlDOM += "<th>"+tableHeadArray[i]+"</th>";
        }
      htmlDOM += "</tr></thead>";
      htmlDOM += "<tbody>";
        var j = 1;
        for(var i = 0; i < data.length; i++){
          htmlDOM += "<tr class='editable-row' data-id='"+data[i].anime_id+"'>";
          htmlDOM += "<td class='text-center'>"+j+"</td>";
          // htmlDOM += "<td class='p-1'><img width='100' height='130' src='"+data[i].anime_poster+"' /></td>";
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
     setTimeout(selectAnime(), 500)
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
  var anime_mal_id = $('[name="anime_mal_id"]').val();
  var type = "POST";
  var arr_apl_title = [];
  var arr_apl_link = [];
  var emptyVal = 0;
  var successAction = function(response){
    if(response.status === true){
      openAlert({
        alertType : "success",
        alertTitle : "Berhasil",
        alertMessage : "Playlist berhasil ditambahkan"
      });
      showPlayListAction(anime_mal_id);
    } else {
      console.log(response);
      openAlert({
        alertType : "danger",
        alertTitle : "Gagal!!",
        alertMessage : "Tidak bisa menambahkan Playlist, Cek konsol!"
      });
    }
  }
  var beforeSendAction = function(){

  }
  var errorAction = function(response){
    console.log(response);
    openAlert({
      alertType : "danger",
      alertTitle : "Gagal!!",
      alertMessage : "Tidak bisa menambahkan Playlist, Cek konsol!"
    });
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
    ajaxSendJSON(url, type, apl_data, beforeSendAction, successAction , errorAction);
  }
 }
}

function animeAddPlayList(){
  $("#saveAnimePlayList").on("click", function(){
    animeAddPlayListAction();
  });
}




function selectAnimeAction(anime_id){
  // console.log(anime_id);
  var url = "api/animes?anime_id="+anime_id;
  var type = "GET";
  var data = {};
  var successAction = function(response){
    console.log(response);
    // console.log('masuk')
    var status = response.status;
    if(status === true){
      var data = response.data[0];
      console.log(data)
      
      $.fn.hasValue = function(){
        if(this.val() != ""){
          this.siblings("label").addClass("has-val");
        }
      }
      $("[name='anime_mal_id']").val(data.anime_mal_id).hasValue();
      $('[name="anime_title"]').val(data.anime_title).hasValue();
      $('[name="anime_alternative"]').val(data.anime_alternative).hasValue();
      $('[name="anime_genre"]').val(data.anime_genre).hasValue();
      $('[name="anime_type"]').val(data.anime_type).hasValue();
      $('[name="anime_status"]').val(data.anime_status).hasValue();
      $('[name="anime_score"]').val(data.anime_score).hasValue();
      $('[name="anime_episode"]').val(data.anime_episode).hasValue();
      $('[name="anime_duration"]').val(data.anime_duration).hasValue();
      $('[name="anime_release"]').val(data.anime_release).hasValue();
      $('[name="anime_trailer"]').val(data.anime_trailer).hasValue();
      $('[name="anime_poster"]').val(data.anime_poster).hasValue();
      $('.cover-pic img').attr("src", data.anime_poster);
      $('[name="anime_sinopsis"]').val(data.anime_sinopsis).hasValue();
      $('[name="anime_studios"]').val(data.anime_studios).hasValue();
      $('#editAnime').attr('data-id', anime_id).show().removeClass('d-none');
      $('#addAnime').hide();
      $("#generate_mal").val("Disable").attr('disabled', '');

      $('html, body').animate({
        scrollTop : 0
      },500)
      var anime_mal_id = $("[name='anime_mal_id']").val();
      setTimeout(showPlayListAction(anime_mal_id), 500)

    } else {
      console.log(response)
    }
  };
  var beforeSendAction = function(){
    console.log("loading");
  }
  var errorAction = function(response){
    console.log('error',response);
  };

  ajaxSendJSON(url, type, data, beforeSendAction, successAction, errorAction);
}

function selectAnime(){
 $(".editable-row").on("dblclick", function(){
   var anime_id = $(this).attr('data-id');
   selectAnimeAction(anime_id);
 })
}

function editAnimeAction(anime_id){
  var url = "api/animes";
  var type = "PUT";
  var anime_data = {
    anime_id : anime_id,
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
  var successAction = function(response){
    if(response.status === true){
      var message = response.pesan
      var dataAlert = {
        alertType : "success",
        alertTitle : "Sukses!!",
        alertMessage : message,
      }
      
      openAlert(dataAlert);
      animeListShow();
      $("#editAnime").removeAttr('disabled');

    } else {
      var message = response.responseJSON.pesan
      console.log(response);
      var dataAlert = {
        alertType : "danger",
        alertTitle : "Gagal!!",
        alertMessage : message,
      }
      $("#editAnime").removeAttr('disabled');
      openAlert(dataAlert);
    }
  }
  var beforeSendAction = function(){
    console.log("Loading..")
  }
  var errorAction = function(response){
    var message = response.responseJSON.pesan
    console.log(response)
    var dataAlert = {
      alertType : "danger",
      alertTitle : "Gagal!!",
      alertMessage : message,
    }
    $("#editAnime").removeAttr('disabled');
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

function editAnime(){
  $('#editAnime').on("click", function(){
    var anime_id = $(this).attr("data-id");
    editAnimeAction(anime_id);
    $(this).attr('disabled', '');
  })
}

function showPlayListAction(anime_mal_id){
  if(typeof(anime_mal_id === "undefined") || anime_mal_id == "" || anime_mal_id === null){
    anime_mal_id = $('[name="anime_mal_id"]').val();
  }
  
  var param = "anime_mal_id";
  var type = "GET";
  var url = "api/animes/APL?"+param+"="+anime_mal_id;
  var successAction = function(response){
    if(response.status === true){
      console.log(response);
      var html = "";
      var dataAPL = response.data;
      var j = 1;

      html += "<ul>";
      for(var i = 0; i < dataAPL.length; i++){
        html += "<li><a class='apl-preview' data-toggle='modal' data-target='#modalPlayList' href='javascript:void(0)' data-mal-id='"+dataAPL[i].anime_mal_id+"' data-play-id='"+dataAPL[i].play_id+"' data-pub='"+dataAPL[i].published+"' data-url='"+dataAPL[i].anime_play_link+"'>"+dataAPL[i].anime_play_title+"</a></li>";
      }
      html += "</ul>";

      $("#playListShow").html(html);
      setTimeout(aplPreview(), 500);
    }
    else {
      console.log(response)
      $("#playListShow").html("<div class='text-center'><span>Tidak ada playlist</span></div>");
    }
  }
  var beforeSendAction = function(){
    console.log("Loading to get playlist..")
  }
  var errorAction = function(response){
    console.log(response)
    $("#playListShow").html("<div class='text-center'><span>Tidak ada playlist</span></div>");
  }

  ajaxSendJSON(url, type, {}, beforeSendAction, successAction, errorAction);

}

function aplPreviewAction(anime_title, title, url, mal_id){
  $.fn.hasValue = function(){
    if(this.val() != ""){
      this.siblings("label").addClass("has-val");
    }
  }
  
  var modal_title = anime_title + " : " + title;
  var video_wrapper = '<iframe class="embed-responsive-item" src="'+url+'" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen></iframe>';
  $('#modalPlayListTitle').text(modal_title);
  $('#playlist-video').html(video_wrapper);
  $('#play_link').val(url).hasValue();
  $('#play_title').val(title).hasValue();
  $('#play_mal_id').val(mal_id);

}
function aplPreview(){
  $('.apl-preview').on('click', function(){
    var title = $(this).text();
    var url = $(this).attr('data-url');
    var anime_title = $('[name="anime_title"]').val();
    var play_id = $(this).attr('data-play-id');
    var mal_id = $(this).attr('data-mal-id');

    $('#editAPL').attr('data-id', play_id);
    $('#deleteAPL').attr('data-id', play_id);
    aplPreviewAction(anime_title, title, url, mal_id);
  })
  $('.modal-close').on('click', function(){
    $('#playlist-video').html("");
  })
}

function editAPLAction(play_id){
  var url = "api/animes/APL";
  var type = "PUT";
  var data = {
    play_id : play_id,
    anime_mal_id : $('#play_mal_id').val(),
    anime_play_title : $('#play_title').val(),
    anime_play_link : $('#play_link').val(),
  }

  var successAction = function(response){
    if(response.status === true){
      openAlert({
        alertType : "success",
        alertTitle : "Sukses!!",
        alertMessage : "Playlist berhasil diedit"
      });
      showPlayListAction($('#play_mal_id').val());
    } else {
      console.log(response);
      openAlert({
        alertType : "danger",
        alertTitle : "Gagal!!",
        alertMessage : "Tidak bisa mengedit, Cek konsol"
      });
    }
  }
  var beforeSendAction = function(){
    console.log('loading to edit playlist..')
  }
  var errorAction = function(response){
    console.log(response);
    openAlert({
      alertType : "danger",
      alertTitle : "Gagal!!",
      alertMessage : "Tidak bisa mengedit, Cek konsol"
    });
  }
  console.log(data);
  ajaxSendJSON(url, type, data, beforeSendAction, successAction, errorAction);
}

function editAPL(){
  $('#editAPL').on('click', function(){
    var play_id = $(this).attr('data-id');
    editAPLAction(play_id);
  })
}

function deleteAPLAction(play_id){
  var type = "DELETE";
  var params = "play_id";
  var url = "api/animes/APL?"+params+"="+play_id;
  var successAction = function(response){
    if(response.status === true){
      openAlert({
        alertType : "success",
        alertTitle : "Sukses!!",
        alertMessage : "Playlist berhasil dihapus"
      });
      showPlayListAction($('#play_mal_id').val());
      $('#modalPlayList').modal('hide');
    } else {
      console.log(response);
      openAlert({
        alertType : "danger",
        alertTitle : "Gagal!!",
        alertMessage : "Tidak bisa menghapus, Cek konsol"
      });
    }
  }
  var beforeSendAction = function(){
    console.log("Loading untuk penghapusan..")
  }
  var errorAction = function(response){
    console.log(response)
    openAlert({
      alertType : "danger",
      alertTitle : "Gagal!!",
      alertMessage : "Tidak bisa menghapus, Cek konsol"
    });
  }

  ajaxSendJSON(url, type, {}, beforeSendAction, successAction, errorAction);
}

function deleteAPL(){
  $("#deleteAPL").on('click', function(){
    var play_id = $(this).attr('data-id');
    deleteAPLAction(play_id)
  })
}

$(document).ready(function(){
	grabber();
  AddAnime();
  resetForm();
  animeListShow();
  addAnimePlayListForm();
  deleteAPLB();
  animeAddPlayList();
  selectAnime();
  editAnime();
  aplPreview();
  editAPL();
  deleteAPL();
});