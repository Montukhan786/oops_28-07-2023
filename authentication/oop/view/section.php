
<!-- carousal part start -->

<div class="main">
        <div class="content">
            <div class="images">
                <img src="images/img-1.jpg" alt="img1" class="fade">
                <img src="images/img-2.jpg" alt="img2" class="fade">
                <img src="images/img-3.jpg" alt="img3" class="fade">
                <img src="images/img-4.jpg" alt="img4" class="fade">
            </div>

            <div onclick="side_slide(-1)" class="slide left">
                <span class="fas fa-angle-left">
                    < </span>
            </div>

            <div onclick="side_slide(1)" class="slide right">
                <span class="fas fa-angle-right"> > </span>
            </div>

            <div class="btm-sliders">
                <span onclick="btm_slide(1)"></span>
                <span onclick="btm_slide(2)"></span>
                <span onclick="btm_slide(3)"></span>
                <span onclick="btm_slide(4)"></span>
            </div>
        </div>
    </div>


    <!-- About us section start -->
    <!-- <section class="my-5">
        <div class="py-5">
            <h1 class="text-center">About Us</h1>
        </div>

        <div class="container-fluid about">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 about-left">
                    <img src="images/farmer.jpg" alt="Farmer" class="img-fluid about-img" />
                </div>

                <div class="col-lg-6 col-md-12 col-12 about-right">
                    <h2 class="display-4">I am a Nature Lover</h2>
                    <p class="py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. At, quos?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto consequuntur excepturi perferendis amet, labore reprehenderit ad dolorem hic molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, numquam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta voluptate, sint cumque voluptatibus iure maiores esse enim dolores, aliquam, adipisci tempore. Blanditiis ad harum, temporibus voluptatem voluptas quae assumenda culpa! Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis sequi quod facere. Saepe, veritatis eum! Natus fuga quia placeat quo eaque, porro at sequi sapiente repellendus, assumenda adipisci modi blanditiis provident veritatis odit illo</p>
                    <a href="about.php" class="btn btn-success">Know more</a>
                </div>

            </div>
        </div>

    </section> -->

    <!-- Service section start -->

    <!-- <section class="my-5">
        <div class="py-5">
            <h1 class="text-center">Services</h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/service-1.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Beautiful nature</h4>
                            <p class="card-text">Some example text.</p>
                            <a href="#" class="btn btn-success">See Profile</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/service-2.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Beautiful nature</h4>
                            <p class="card-text">Some example text.</p>
                            <a href="#" class="btn btn-success">See Profile</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/service-3.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Beautiful nature</h4>
                            <p class="card-text">Some example text.</p>
                            <a href="#" class="btn btn-success">See Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> -->

    <!-- card scroll effect -->
    <section class="card-scroll">
        <div class="container reveal">
            <h2>Your Title</h2>
            <div class="cards">

                <div class="text-card">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis eveniet eos cumque, nihil consectetur veniam placeat odio. Modi, facere consequuntur repudiandae asperiores saepe molestiae corporis odit rem pariatur! Perspiciatis, tenetur.</p>
                </div>

                <div class="text-card">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis eveniet eos cumque, nihil consectetur veniam placeat odio. Modi, facere consequuntur repudiandae asperiores saepe molestiae corporis odit rem pariatur! Perspiciatis, tenetur.</p>
                </div>

                <div class="text-card">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis eveniet eos cumque, nihil consectetur veniam placeat odio. Modi, facere consequuntur repudiandae asperiores saepe molestiae corporis odit rem pariatur! Perspiciatis, tenetur.</p>
                </div>

            </div>
        </div>
    </section>

    

    <!-- Gallary section start -->
    <div class="full-img" id="fullImgBox">
        <img src="images/gallary.jpg" alt="" id="fullImg">
        <span onclick="closeFullImg()">X</span>
    </div>

    <div class="img-gallary">
        <img src="images/img-1.jpg" alt="" onclick="openFullImg(this.src)">
        <img src="images/img-2.jpg" alt="" onclick="openFullImg(this.src)">
        <img src="images/img-3.jpg" alt="" onclick="openFullImg(this.src)">
        <img src="images/img-4.jpg" alt="" onclick="openFullImg(this.src)">
        <img src="images/img-5.jpg" alt="" onclick="openFullImg(this.src)">
        <img src="images/service-1.jpg" alt="" onclick="openFullImg(this.src)">
        <img src="images/service-2.jpg" alt="" onclick="openFullImg(this.src)">
        <img src="images/service-3.jpg" alt="" onclick="openFullImg(this.src)">
    </div>



    <!-- Feedback form start -->
    <section class="my-5 feedback-section">
        <div class="py-5 div-title">
            <h1 class="text-center">Feedback Form</h1>
        </div>

        <div class="w-50 m-auto feedback-form">
            <form action="database_connection/userinfo.php" method="post" id="frm">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control">
                </div>

                <div class="form-group">
                    <label>E-mail Id</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <input type="number" name="mobile" class="form-control">
                </div>

                <div class="select-box">
                    <label>Language</label>

                    <input type="checkbox" name="language[]" value="Hindi">
                    <label>Hindi</label>

                    <input type="checkbox" name="language[]" value="Urdu">
                    <label>Urdu</label>

                    <input type="checkbox" name="language[]" value="English">
                    <label>English</label>

                </div>

                <div class="form-group">
                    <label>Comments</label>
                    <textarea class="form-control" name="comments"></textarea>
                </div>

                <div class="form-group form-group-last">
                <button type="submit" class="btn btn-success feedback-submit">Submit</button>
                </div>
                
            </form>
        </div>

    </section>