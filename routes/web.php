<?php
use Illuminate\Database\Query\Builder;
use App\xe_dat;
Route::get('/', function () {
     return view('welcome');
 });

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loai-sanpham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chitiet-sanpham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);


/* route nguoi dung*/
	Route::get('dangky-nguoidung',[
		'as'=>'dangkynguoidung',
		'uses'=>'CustomerController@getDangkynguoidung'
	]);
	Route::post('dangky-nguoidung',[
		'as'=>'dangkynguoidung',
		'uses'=>'CustomerController@postDangkynguoidung'
	]);
	Route::get('dangnhapnguoidung',[
		'as'=>'dangnhapnguoidung',
		'uses'=>'CustomerController@getDangnhap'
	]);
	Route::post('dangnhapnguoidung',[
		'as'=>'dangnhapnguoidung',
		'uses'=>'CustomerController@postDangnhap'
	]);
	Route::get('dangxuat',[
		'as'=>'dangxuat',
		'uses'=>'CustomerController@DangXuat'
	]);


	Route::group(['prefix'=>'khachhang','middleware'=>'nguoiDungLogin'],function(){
			Route::get('nguoidungdoimatkhau',[
			'as'=>'doimatkhau',
			'uses'=>'CustomerController@getDoimatkhau'
			]);

			Route::post('nguoidungdoimatkhau',[
				'as'=>'doimatkhau',
				'uses'=>'CustomerController@postDoimatkhau'
			]);

			Route::get('datxe/{id}',[
			'as'=>'datxe',
			'uses'=>'CustomerController@getDatxe'
			]);


			Route::get('thongtin_xedat/{id}',[
			'as'=>'thongtinxedat',
			'uses'=>'CustomerController@getThongTinDatXe'

			]);
			Route::post('thongtin_xedat/{id}',[
				'as'=>'thongtinxedat',
				'uses'=>'CustomerController@postThongTinDatXe'

			]);

			Route::get('xem_danhsachchoduyet',[
				'as'=>'xemdanhsachdangchoduyet',
				'uses'=>'CustomerController@getXemDanhSachDangChoDuyet'
			]);
			Route::get('xem_danhsachdaduyet',[
				'as'=>'xemdanhsachdaduyet',
				'uses'=>'CustomerController@getXemDanhSachDaDuyet'
			]);
			Route::get('xoa_danhsachchoduyet/{id}',[
				'as'=>'khachxoayeucau',
				'uses'=>'CustomerController@getXoayeucau'
			]);



			Route::get('chitiet-nguoidung',[
			'as'=>'chitietnguoidung',
			'uses'=>'CustomerController@getChitietnguoidung'
			]);

	});
	
		
/* route admin*/
		Route::get('admin-login',[
			'as'=>'loginadmin',
			'uses'=>'AdminController@getLogin'
		]);
		Route::post('admin-login',[
			'as'=>'loginadmin',
			'uses'=>'AdminController@postLogin'
		]);		
Route::group(['prefix'=>'Admin','middleware'=>'adminLogin'],
	function(){

				Route::get('admin-index',[
					'as'=>'indexadmin',
					'uses'=>'AdminController@index'
				]);
				Route::get('admin-thongtin',[
					'as'=>'thongtinadmin',
					'uses'=>'AdminController@getThongtin'
				]);
				
				Route::get('admin-danhsachuser',[
					'as'=>'danhsachuser',
					'uses'=>'AdminController@getDanhsachuser'
				]);

				Route::get('sua_user/{id}',[
							'as'=>'suaUser',
							'uses'=>'AdminController@getSuaUser'
						]);
				Route::post('sua_user/{id}',[
							'as'=>'suaUser',
							'uses'=>'AdminController@postSuaUser'
						]);
					Route::get('them_user',[
							'as'=>'themuser',
							'uses'=>'AdminController@getThemUser'
						]);
					Route::post('them_user',[
							'as'=>'themuser',
							'uses'=>'AdminController@postThemUser'
						]);

					Route::get('xoa_user/{id}',[
							'as'=>'xoaUser',
							'uses'=>'AdminController@getXoa'
						]);
					Route::get('Danhsach_Loaixe',[
							'as'=>'danhsachloaixe',
							'uses'=>'AdminController@getDanhsachloaixe'
						]);
					Route::get('them_Loaixe',[
							'as'=>'themLoaiXe',
							'uses'=>'AdminController@getThemLoaiXe'
						]);
					Route::post('them_Loaixe',[
							'as'=>'themLoaiXe',
							'uses'=>'AdminController@postThemLoaiXe'
						]);
					Route::get('xoa_loaixe/{id}',[
							'as'=>'xoaLoaiXe',
							'uses'=>'AdminController@getXoaLoaixe'
						]);
					Route::get('Dsxe_Loaixe',[
							'as'=>'danhsachxeoto',
							'uses'=>'AdminController@getDanhsachOto'
						]);
					Route::get('DsxeMay_Loaixe',[
							'as'=>'danhsachXmay',
							'uses'=>'AdminController@getDanhsachXmay'
						]);
					Route::get('Xoa_xeoto/{id}',[
							'as'=>'xoaxeoto',
							'uses'=>'AdminController@getXoaxeoto'
						]);

					Route::get('Ds_Slide',[
							'as'=>'danhsachslide',
							'uses'=>'AdminController@getDanhsachSlide'
						]);

					Route::get('them_Slide',[
							'as'=>'themSlide',
							'uses'=>'AdminController@getThemSlide'
						]);	
					Route::Post('them_Slide',[
							'as'=>'themSlide',
							'uses'=>'AdminController@postThemSlide'
						]);	

					Route::get('sua_Slide/{id}',[
							'as'=>'suaSlide',
							'uses'=>'AdminController@getSuaSlie'
						]);
					Route::post('sua_Slide/{id}',[
							'as'=>'suaSlide',
							'uses'=>'AdminController@postSuaSlide'
						]);

					Route::get('xoa_Slide/{id}',[
						'as'=>'xoaSlide',
						'uses'=>'AdminController@getXoaSlide'
					]);
				Route::get('logout',[
					'as'=>'dangxuattaikhoan',
					'uses'=>'AdminController@DangXuat'
				]);

	});
		
/* route đối tác */
		Route::get('doitac-login',[
					'as'=>'doitaclogin',
					'uses'=>'DoiTacController@getLogin'
				]);
				Route::post('doitac-login',[
					'as'=>'doitaclogin',
					'uses'=>'DoiTacController@PostDoiTacLogin'
				]);		
		Route::group(['prefix'=>'doitac','middleware'=>'doitacLogin'],
			function(){

						Route::get('doitac-index',[
							'as'=>'doitacindex',
							'uses'=>'DoiTacController@index'
						]);


						Route::get('doitac_doimatkhau',[
						'as'=>'doitacdoimatkhau',
						'uses'=>'DoitacController@getDoimatkhau'
						]);

						Route::post('doitac_doimatkhau',[
							'as'=>'doitacdoimatkhau',
							'uses'=>'DoitacController@postDoimatkhau'
						]);

						Route::get('doitac-thongtinkhachhang/{id}',[
							'as'=>'thongtinkhachhang',
							'uses'=>'DoiTacController@getThongtinkhachhang'
						]);

						Route::get('danhsach_xe',[
							'as'=>'danhsachXe',
							'uses'=>'DoiTacController@getDanhSachXe'
						]);	

						Route::get('them_xe',[
							'as'=>'themxe',
							'uses'=>'DoiTacController@getThemXe'
						]);
						Route::post('them_xe',[
							'as'=>'themxe',
							'uses'=>'DoiTacController@postThemXe'
						]);

						Route::get('suaxe/{id}',[
							'as'=>'doitacsuaxe',
							'uses'=>'DoiTacController@getSuaXe'
						]);
						Route::post('suaxe/{id}',[
							'as'=>'doitacsuaxe',
							'uses'=>'DoiTacController@postSuaXe'
						]);

						Route::get('xoaxe/{id}',[
							'as'=>'doitacxoaxe',
							'uses'=>'DoiTacController@getXoaXe'
						]);


						Route::get('xem_yeucau',[
							'as'=>'xemyeucau',
							'uses'=>'DoiTacController@getXemYeuCau'
						]);
						Route::get('duyet_yeucau/{id}',[
							'as'=>'duyetyeucau',
							'uses'=>'DoiTacController@getDuyetyeucau'
						]);
						Route::get('xoa_yeucau/{id}',[
							'as'=>'xoayeucau',
							'uses'=>'DoiTacController@getXoaYeuCau'
						]);
						
						Route::get('xem_danhsachdaduyet',[
							'as'=>'xemyeucaudaduyet',
							'uses'=>'DoiTacController@getXemYeuCauDaDuyet'
						]);
						Route::get('duyet_chomuon/{id}',[
							'as'=>'chomuonxe',
							'uses'=>'DoiTacController@getChoMuon'
						]);
						Route::get('xem_danhsachdangthue',[
							'as'=>'xemdanhsachdangthue',
							'uses'=>'DoiTacController@getXemDanhSachDangThue'
						]);
						Route::get('duyet_traxe/{id}',[
							'as'=>'duyettraxe',
							'uses'=>'DoiTacController@getTra'
						]);

						Route::get('doitac-hoadon/{id}',[
							'as'=>'hoadon',
							'uses'=>'DoiTacController@getHoaDon'
						]);	

						Route::get('doitac-hoadontraxe/{id}',[
							'as'=>'hoadontraxe',
							'uses'=>'DoiTacController@getHoaDonTraXe'
						]);	

						Route::get('doitac-xemhoadon',[
							'as'=>'xemhoadon',
							'uses'=>'DoiTacController@getXemHoaDon'
						]);	

						Route::get('logout',[
							'as'=>'doitacdangxuattaikhoan',
							'uses'=>'DoiTacController@DangXuat'
						]);

			});