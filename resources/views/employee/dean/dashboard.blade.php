@extends('layouts::teacher.app')

@section('content')
<div class="content">
    <div class="container-fluid">
       <div class="row">
          <!-- Profil Card -->
          <div class="col-md-4">
             <div class="card card-widget widget-user">
                <div class="widget-user-header bg-info">
                   <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="../dist/img/user8-128x128.jpg" alt="User Avatar">
                   </div>
                   <h3 class="widget-user-username">Dekan</h3>
                   <h5 class="widget-user-desc">Informatika fakulteti dekani</h5>
                </div>
                <div class="card-body">
                   <br>
                   <hr>
                   <!-- Shaxsiy Ma'lumotlar -->
                   <h4 class="mt-4">Shaxsiy Ma'lumotlar</h4>
                   <table class="table">
                      <tbody>
                         <tr>
                            <td>
                               <i class="fas fa-user"></i> Ism
                            </td>
                            <td>Dekan</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-user-tag"></i> Familiya
                            </td>
                            <td>Fakultet dekani</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-flag"></i> Millati
                            </td>
                            <td>O'zbek</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-graduation-cap"></i> Lavozimi
                            </td>
                            <td>Informatika fakulteti dekani</td>
                         </tr>
                         <!--<tr>
                            <td>
                               <i class="fas fa-level-up-alt"></i> Toifasi
                            </td>
                            <td>Professor</td>
                         </tr>-->
                         <tr>
                            <td>
                               <i class="fas fa-calendar-alt"></i> Tug'ilgan yili
                            </td>
                            <td>1965</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-passport"></i> Pasport seriyasi
                            </td>
                            <td>AA1234567</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-university"></i> Fakultet
                            </td>
                            <td>Informatika</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-home"></i> Doimiy yashash manzili
                            </td>
                            <td>Tashkent, Uzbekistan</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-id-card"></i> JSHSHIR raqami
                            </td>
                            <td>12345678901234</td>
                         </tr>
                         <tr>
                            <td>
                               <i class="fas fa-phone"></i> Telefon raqami
                            </td>
                            <td>+998 90 123 45 67</td>
                         </tr>
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
          <!-- Statistika Cardlari -->
          <div class="col-md-8">
             <div class="row">
                <div class="col-md-6">
                   <div class="card card-widget widget-user-2">
                      <div class="widget-user-header bg-gradient-secondary">
                         <h3 class="widget-user-username">Umumiy talabalar</h3>
                         <h5 class="widget-user-desc">Talabalar soni</h5>
                      </div>
                      <div class="card-body">
                         <div class="row">
                            <div class="col-sm-4 border-right">
                               <div class="description-block">
                                  <h5 class="description-header">100</h5>
                                  <span class="description-text">talaba</span>
                               </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                               <div class="description-block">
                                  <h5 class="description-header">20</h5>
                                  <span class="description-text">ayol talaba</span>
                               </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                               <div class="description-block">
                                  <h5 class="description-header">80</h5>
                                  <span class="description-text">erkak talaba</span>
                               </div>
                            </div>
                            <!-- /.col -->
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="card card-widget widget-user-2">
                      <div class="widget-user-header bg-gradient-info">
                        <h3 class="widget-user-username">Nomdor stipendiyaga tushgan arizalar</h3>
                        <h5 class="widget-user-desc">Arizalar soni</h5>
                      </div>
                      <div class="card-body">
                         <div class="row">
                            <div class="col-sm-4 border-right">
                               <div class="description-block">
                                  <h5 class="description-header">30</h5>
                                  <span class="description-text">ariza</span>
                               </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                               <div class="description-block">
                                  <h5 class="description-header">10</h5>
                                  <span class="description-text">ayol talaba arizasi</span>
                               </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                               <div class="description-block">
                                  <h5 class="description-header">20</h5>
                                  <span class="description-text">erkak talaba arizasi</span>
                               </div>
                            </div>
                            <!-- /.col -->
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
