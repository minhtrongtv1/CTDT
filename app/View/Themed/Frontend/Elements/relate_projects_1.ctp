<?php 

//Liet ke 5 de xuat cung chuyen muc//
$projects=$this->requestAction(array('controller'=>'projects','action'=>'relate_projects',$project_id));

debug($projects);
?> 

<section id="products">
        <div class="container d-flex justify-content-center mt-50 mb-50">

            <div class="row">
                <h2 style="color:rgba(1, 4, 136, 0.9)">NHU CẦU CÙNG LĨNH VỰC</h2>
                <div class="col-md-12">

                    <div class="card card-body">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0"> <img src="https://i.imgur.com/5Aqgz7o.jpg" width="100" height="100" alt=""> </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <a href="/projects/view/1" data-abc="true">Máy nhặt rác tự động ở công cộng và phân loại rác</a> </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Nguyễn Thái Toàn</a></li>
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Huỳnh Đăng Khoa</a></li>

                                </ul>
                                <p class="mb-3">128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor | 
                                    Gorilla Glass with high quality display </p>
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">Lĩnh vực <a href="#" data-abc="true">Khoa học công nghệ</a></li>

                                </ul>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                <div class="text-muted">1985 reviews</div> <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Xem chi tiết</button>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mt-3">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0"> <img src="https://i.imgur.com/Aj0L4Wa.jpg" width="150" height="150" alt=""> </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <a href="/projects/view/1" data-abc="true">Máy nhặt rác tự động ở công cộng và phân loại rác</a> </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Nguyễn Thái Toàn</a></li>
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Huỳnh Đăng Khoa</a></li>

                                </ul>
                                <p class="mb-3">128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor | Gorilla Glass with high quality display </p>
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">Lĩnh vực <a href="#" data-abc="true">Khoa học công nghệ</a></li>

                                </ul>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                <div class="text-muted">2349 reviews</div> <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Xem chi tiết</button>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mt-3">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0"> <img src="https://i.imgur.com/5Aqgz7o.jpg" width="150" height="150" alt=""> </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"> <a href="/projects/view/1" data-abc="true">Sáng tạo được cánh cửa thần kì của doraemon</a> </h6>
                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Nguyễn Thái Toàn</a></li>
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Huỳnh Đăng Khoa</a></li>

                                </ul>
                                <p class="mb-3">128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor | Gorilla Glass with high quality display </p>
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">Lĩnh vực <a href="#" data-abc="true">Khoa học công nghệ</a></li>

                                </ul>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                <div class="text-muted">1985 reviews</div> <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Xem chi tiết</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>