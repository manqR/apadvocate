<?php

/* @var $this \yii\web\View */
/* @var $content string */

	use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;
	use common\widgets\Alert;
	

	$this->registerJs('
		
			$(function () {				
				
				var url = window.location.pathname; 
				var activePage = url.substring(url.lastIndexOf("/") + 1);				
				$(".nav li a").each(function () { 
					var linkPage = this.href.substring(this.href.lastIndexOf("/") + 1);
					
					var $this = $(this);
					var activePageSplit = activePage.split("-");
					
					if (activePage == linkPage || activePageSplit[0] == linkPage) {																										
						$(this).parents("li").addClass("open");												
					}
					
				});
			})
			
		');
			

?>



<!--sidebar panel-->
<div class="off-canvas-overlay" data-toggle="sidebar"></div>
<div class="sidebar-panel">
    <div class="brand">
        <!-- toggle offscreen menu -->
        <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up">
        <i class="material-icons">menu</i>
        </a>
        <!-- /toggle offscreen menu -->
        <!-- logo -->
        <a class="brand-logo">
			<img class="expanding-hidden" src="../images/logo.png" alt=""/>
        </a>
        <!-- /logo -->
    </div>
    <div class="nav-profile dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <div class="user-image">
                <img src="../images/avatar.jpg" class="avatar img-circle" alt="user" title="user"/>
            </div>
            <div class="user-info expanding-hidden">
                <?= Yii::$app->user->identity->username ?>
                <small class="bold">Client</small>
            </div>
        </a>
        <div class="dropdown-menu">
         	
			<?=				  
				  Html::beginForm(['/site/logout'], 'post')
				. Html::submitButton(
					'Logout',
					['class' => 'dropdown-item']
				)
				. Html::endForm()
			?>
           
        </div>
    </div>
    <!-- main navigation -->
    <nav>
        <p class="nav-title">NAVIGATION</p>
        <ul class="nav">
            <!-- dashboard -->
            <li>
                <a href="<?= Yii::$app->homeUrl; ?>">
                <i class="material-icons text-primary">home</i>
                <span>Home</span>
                </a>
            </li>
            <!-- /dashboard -->
         
			<!-- Client -->
			<li>
                <a href="client">
                <i class="material-icons text-success">assignment</i>
                <span>Add Client</span>
                </a>
            </li>
            <!-- /Client -->
			
			

            <!-- Payment -->
			<li>
                <a href="category">
                <i class="material-icons text-danger">payment</i>
                <span>Upload Category</span>
                </a>
            </li>
            <!-- /Payment -->


			<!-- Upload -->
			<li>
                <a href="upload">
                <i class="material-icons text-warning">gavel</i>
                <span>Upload</span>
                </a>
            </li>
            <!-- /Upload -->
			

			<!-- Payment -->
			<li>
                <a href="payment">
                <i class="material-icons text-info">payment</i>
                <span>Payment</span>
                </a>
            </li>
            <!-- /Payment -->
			

            <li>
                <hr/>
            </li>
			
            <!-- documentation -->
            <li>
                <a href="http://milestone.nyasha.me/latest/documentation" target="_blank">
                <i class="material-icons">local_library</i>
                <span>Documentation</span>
                </a>
            </li>
            <!-- /documentation -->
        </ul>
    </nav>
    <!-- /main navigation -->
</div>			