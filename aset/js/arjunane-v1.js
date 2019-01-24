/* global arxg */

function info_gagal(teks) {
	return '<div class="info-gagal"><span>' + teks + '</span></div>';
}

function info_berhasil(teks) {
	return '<div class="info-berhasil"><span>' + teks + '</span></div>';
}

function isJsonString(str) {
	try {
		JSON.parse(str);
	} catch (e) {
		return false;
	}
	return true;
}

function removeURL(key, sourceURL) {
	var rtn = sourceURL.split("?")[0],
			  param,
			  params_arr = [],
			  queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
	if (queryString !== "") {
		params_arr = queryString.split("&");
		for (var i = params_arr.length - 1; i >= 0; i -= 1) {
			param = params_arr[i].split("=")[0];
			if (param === key) {
				params_arr.splice(i, 1);
			}
		}
		if (params_arr.length > 0) {
			rtn = rtn + "?" + params_arr.join("&");
		} else {
			rtn = rtn + params_arr.join("&");
		}
	}
	return rtn;
}

function waktu_mulai() {
	var hari = new Date();
	var jam = hari.getHours();
	var menit = hari.getMinutes();
	var detik = hari.getSeconds();
	menit = cek_waktu(menit);
	detik = cek_waktu(detik);
	waktu_windows = document.getElementById('waktu-windows');
	if (waktu_windows !== null) {
		waktu_windows.innerHTML =
				  jam + ":" + menit + ":" + detik;
	}
	var waktu = setTimeout(waktu_mulai, 500);
}

function cek_waktu(i) {
	if (i < 10) {
		i = "0" + i;
	};
	return i;
}

function icon_desktop(params,params_2=null) { 
	var icon = params, attr_icon = params.attr('content'), find_by_attr = $('section').find('.' + attr_icon);
	params_2 === 'mouse' ? $('.mouse-click').removeClass('aktif') : null;
	$('.taskbare .body .icon').each(function (x, xxx) {
		var teks = $(this).attr('content'), temukan = $('section').find('.' + teks);
		if (temukan.length !== 0) {
			if (temukan.attr('content') === attr_icon) {
				if (find_by_attr.hasClass('not-show')) {
					temukan.addClass('not-show');
					find_by_attr.removeClass('not-show');
					$(this).addClass('minimize');
					icon.removeClass('minimize');
					icon.addClass('aktif');
				} else {
					find_by_attr.addClass('not-show');
					icon.addClass('minimize');
					icon.removeClass('aktif');
				}
			} else {
				temukan.addClass('not-show');
				$(this).addClass('minimize');
				$(this).removeClass('aktif');
			}
		}
	});
}

function fullScreen() {
	$('.mouse-click').removeClass('aktif');
	if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
		if (document.documentElement.requestFullscreen) {
			document.documentElement.requestFullscreen();
		} else if (document.documentElement.msRequestFullscreen) {
			document.documentElement.msRequestFullscreen();
		} else if (document.documentElement.mozRequestFullScreen) {
			document.documentElement.mozRequestFullScreen();
		} else if (document.documentElement.webkitRequestFullscreen) {
			document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
		}
	} else {
		if (document.exitFullscreen) {
			document.exitFullscreen();
		} else if (document.msExitFullscreen) {
			document.msExitFullscreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();
		} else if (document.webkitExitFullscreen) {
			document.webkitExitFullscreen();
		}
	}
}

function responsive(url) {
	var ada = false, flex = CSS.supports('display', 'flex');
	if (!flex) {
		alert('Nampaknya Browser Anda tidak support untuk "HASIL YANG MAKSIMAL"');
	}
}
$(window).resize(function () { 
	var task = $('.taskbare').outerHeight();
	$('.stare').css('bottom',task);
	$('.properties').css('bottom',task);
});
$(document).ready(function () {

	var base_url = $(document).find('head link#base_url').attr('href');
	$(document).on('click', '.login-akun',function () {
		$('#body-login').addClass('aktif');
	});
	$(document).on('click', '.daftar-akun', function () {
		$('#body-daftar').addClass('aktif');
	});
	$(document).on('click','.option .action .button-back',function () {
		$('#body-login').removeClass('aktif');
		$('#body-daftar').removeClass('aktif');
	});

	$(document).on('click','#table-fixed thead.title-fixed th', function () {
		var table = $('thead.title th').parents('table').eq(0);
		var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
		this.asc = !this.asc;
		if (!this.asc) {
			rows = rows.reverse();
		}
		for (var i = 0; i < rows.length; i++) {
			table.append(rows[i]);
		}
	});


	$(document).on('click','.explorer .close',function () {
		$('.explorer').remove();
		window.history.pushState({}, 'Menu Utama', base_url);
		document.title = "Menu Utama";
		$('#explorer.icon').removeClass('minimize');
		$('#explorer.icon').removeClass('aktif');
	});
	$(document).on('click','.explorer .minimize',function () {
		$('#explorer.icon').addClass('minimize');
		$('#explorer.icon').removeClass('aktif');
		explorer.removeAttr('style');
		$('.explorer .explorer-item .right').find('#table-fixed').css('display', 'none');
		explorer.addClass('not-show');
	});

	$(document).on('click','#table thead.title th', function () {
		var table = $(this).parents('table').eq(0);
		var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
		this.asc = !this.asc;
		if (!this.asc) {
			rows = rows.reverse();
		}
		for (var i = 0; i < rows.length; i++) {
			table.append(rows[i]);
		}
	});

	function comparer(index) {
		return function (a, b) {
			var valA = getCellValue(a, index),
					  valB = getCellValue(b, index);
			return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
		};
	}

	function getCellValue(row, index) {
		return $(row).children('td').eq(index).text();
	}
	var x = as.x;
	$('.mouse-click .body .menu.right').hover(function (event) {
		var sub_menu = $(this).find('.sub-menu.view');
		var panjang = event.pageX + $('.mouse-click').outerWidth(),
				  match_panjang = $(window).width() < panjang;
		var left = match_panjang ? $('.mouse-click .body .menu .sub-menu').outerWidth() : '';
		if (left !== '') {
			sub_menu.css({'left': -left});
		}
	}, function () {
		var sub_menu = $(this).find('.sub-menu.view');
		sub_menu.removeAttr('style');
	});

	$("html").mousedown(function (e) {
		if (e.which === 3 && $(e.target).is('.desktop')) {

			$('.mouse-click').addClass('aktif');
			$(document).bind('contextmenu', function () {
				return false;
			});
			var panjang = e.pageX + $('.mouse-click').outerWidth(),
					  tinggi = e.pageY + $('.mouse-click').outerHeight(),
					  match_tinggi = $(window).height() < tinggi,
					  match_panjang = $(window).width() < panjang;
			var left = match_panjang ? e.pageX - $('.mouse-click').outerWidth() : e.pageX - this.offsetLeft;
			var top = match_tinggi ? e.pageY - $('.mouse-click').outerHeight() : e.pageY - this.offsetTop;
			/*
			 if (match_panjang) {
			 var left = event.pageX - $('.mouse-click').outerWidth(),
			 top = event.pageY - this.offsetTop;
			 } else if (match_tinggi) {
			 var left = event.pageX - this.offsetLeft,
			 top = event.pageY - $('.mouse-click').outerHeight();
			 } else if ($(window).width() < panjang || $(window).height() < tinggi) {
			 var left = event.pageX - $('.mouse-click').outerWidth(),
			 top = event.pageY - $('.mouse-click').outerHeight();
			 console.log('oke semua');
			 } else {
			 var left = event.pageX - this.offsetLeft,
			 top = event.pageY - this.offsetTop;
			 }*/
			if (match_panjang && match_tinggi) {
				var left = e.pageX - $('.mouse-click').outerWidth(),
						  top = e.pageY - $('.mouse-click').outerHeight();
				//console.log('oke semua');
			}
			//console.log('kiri = ' + left + ' dan atas =' + top 
			//	    + '\n tinggi window = ' + $(window).height() + ' dan tinggi = ' + tinggi
			//	    + '\n panjang window = ' + $(window).width() + ' dan panjang = ' + panjang);
			$('.mouse-click').css({'left': left, 'top': top});
		} else if (!$(e.target).is('.mouse-click .body *')) {
			$('.mouse-click').removeClass('aktif');
		}

	});

	console.log(as.x, as.y);
	$('[id="tutup-info"]').click(function () {
		$(this).remove();
	});
	var dino = new Date();
	var minggune = new Array(7);
	minggune[0] = "Minggu";
	minggune[1] = "Senin";
	minggune[2] = "Selasa";
	minggune[3] = "Rabu";
	minggune[4] = "Kamis";
	minggune[5] = "Jumat";
	minggune[6] = "Sabtu";

	var n = minggune[dino.getDay()],
			  hari_ini = document.getElementById("hari-ini");
	if (hari_ini !== null) {
		hari_ini.innerHTML = n + ", ";
	}
});
window.onload = function () {
	waktu_mulai();
};

$(window).load(function () {});