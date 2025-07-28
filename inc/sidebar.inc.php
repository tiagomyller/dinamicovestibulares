
    <div class="sidebar sidebar-fixed">
        <button class="btn-sidebar btn-sidebar-close"> <i class="rsicon rsicon-close"></i></button>

        <div class="widget-area">
            <aside class="widget widget-profile">
                <div class="profile-photo side-photo">
                    <img src="<?=REQUIRE_PATH?>/_img/tm-frame.png" alt="Robert Smith" />
                </div>
                <div class="profile-info">
                    <h2 class="profile-title">Tiago Myller</h2>
                    <h3 class="profile-position">Marido da Talessa ♥ Pai do Kaique e Heitor</h3>
                </div>
            </aside><!-- .widget-profile -->
<!-- 
            <aside class="widget widget_search">
                <h2 class="widget-title">Search</h2>
                <form class="search-form">
                    <label class="ripple">
                        <span class="screen-reader-text">Search for:</span>
                        <input class="search-field" type="search" placeholder="Search">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>
            </aside> --> <!-- .widget_search --> 

            <aside class="widget widget_contact">
                <h2 class="widget-title">Vamos conversar? </h2>
				<form class="contactForm" action="" method="post">
					<div class="input-field">
						<input class="contato-nome" type="text" name="nome" required="" />
						<span class="line"></span>
						<label>Qual teu nome?</label>
					</div>

					<div class="input-field">
						<input class="contato-email" type="email" name="email" required="" />
						<span class="line"></span>
						<label>Seu email para resposta</label>
					</div>

					<div class="input-field">
						<input class="contato-assunto" type="text" name="assunto" required="" />
						<span class="line"></span>
						<label>Sobre o que iremos falar?</label>
					</div>

					<div class="input-field">
						<textarea class="contato-mensagem" rows="4" name="mensagem" required=""></textarea>
						<span class="line"></span>
						<label>Assunto - Gaste teclado</label>
					</div>

					<span class="btn-outer btn-primary-outer ripple">
						<input class="contato-enviar btn btn-lg btn-primary" type="submit" value="Enviar"/>
					</span>
					
					<div class="contact-response"></div>
				</form>
            </aside><!-- .widget_contact -->
<!-- 
            <aside class="widget widget-popuplar-posts">
                <h2 class="widget-title">Popular posts</h2>
                <ul>
                    <li>
                        <div class="post-media"><a href="#"><img src="img/uploads/thumb-78x56-1.jpg" alt=""/></a></div>
                        <h3 class="post-title"><a href="#">Standard Post Format With Featured Image</a></h3>
                        <div class="post-info"><a href="#"><i class="rsicon rsicon-comments"></i>56 comments</a></div>
                    </li>
                    <li>
                        <div class="post-media"><a href="#"><img src="img/uploads/thumb-78x56-2.jpg" alt=""/></a></div>
                        <h3 class="post-title"><a href="#">Standard Post Format With Featured Image</a></h3>
                        <div class="post-info"><a href="#"><i class="rsicon rsicon-comments"></i>56 comments</a></div>
                    </li>
                    <li>
                        <div class="post-media"><a href="#"><img src="img/uploads/thumb-78x56-3.jpg" alt=""/></a></div>
                        <h3 class="post-title"><a href="#">Standard Post Format With Featured Image</a></h3>
                        <div class="post-info"><a href="#"><i class="rsicon rsicon-comments"></i>56 comments</a></div>
                    </li>
                </ul>
            </aside> --><!-- .widget-popuplar-posts -->

            <aside class="widget widget_tag_cloud">
                <h2 class="widget-title">Tags </h2>
                <div class="tagcloud">
                    
                    <a href="#" title="PHP">PHP <i class="fa fa-star"> </i></a>
                    <a href="#" title="MySQL">MySQL</a>
                    <a href="#" title="CSS">CSS</a>
                    <a href="#" title="HTML">HTML</a>
                    <a href="#" title="SQL Server">SQL Server</a>
                    <a href="#" title="Projetos">Projetos</a>
                    <a href="#" title="Brading">Brading</a>
                    <a href="#" title="Café">Café</a>
                    <a href="#" title="Brainstorm">Brainstorm</a>
                    <a href="#" title="Code">Code</a>
                    <a href="#" title="Loves">Love</a>
                    <a href="#" title="Sonhador">Sonhador</a>

                </div>
            </aside><!-- .widget_tag_cloud -->

          <!--   <aside class="widget widget-recent-posts">
                <h2 class="widget-title">Recent posts</h2>
                <ul>
                    <li>
                        <div class="post-tag">
                            <a href="#">#Photo</a>
                            <a href="#">#Architect</a>
                        </div>
                        <h3 class="post-title"><a href="#">Standard Post Format With Featured Image</a></h3>
                        <div class="post-info"><a href="#"><i class="rsicon rsicon-comments"></i>56 comments</a></div>
                    </li>
                    <li>
                        <div class="post-tag">
                            <a href="#">#Photo</a>
                            <a href="#">#Architect</a>
                        </div>
                        <h3 class="post-title"><a href="#">Standard Post Format With Featured Image</a></h3>
                        <div class="post-info"><a href="#"><i class="rsicon rsicon-comments"></i>56 comments</a></div>
                    </li>
                    <li>
                        <div class="post-tag">
                            <a href="#">#Photo</a>
                            <a href="#">#Architect</a>
                        </div>
                        <h3 class="post-title"><a href="#">Standard Post Format With Featured Image</a></h3>
                        <div class="post-info"><a href="#"><i class="rsicon rsicon-comments"></i>56 comments</a></div>
                    </li>
                </ul>
            </aside> --><!-- .widget-recent-posts -->

           <!--  <aside class="widget widget_categories">
                <h2 class="widget-title">Categories</h2>
                <ul>
                    <li><a href="#" title="Architecture Category Posts">Architecture</a> (9)</li>
                    <li><a href="#" title="Business Category Posts">Business</a> (16)</li>
                    <li><a href="#" title="Creative Category Posts">Creative</a> (18)</li>
                    <li><a href="#" title="Design Category Posts">Design</a> (10)</li>
                    <li><a href="#" title="Development Category Posts">Development</a> (14)</li>
                    <li><a href="#" title="Education Category Posts">Education</a> (9)</li>
                </ul>
            </aside><!-- .widget_categories -->
        </div> --><!-- .widget-area -->
    </div><!-- .sidebar -->