<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.hostgator
 *
 * @copyright   Copyright (C) 20015  luuhoabk.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('templates/' . $this->template . '/js/template.js');
//$doc->addScript

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/boostrap.min.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/hostgator.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:jdoc="http://www.w3.org/1999/XSL/Transform"
	  xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"
	  dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php // Use of Google Font ?>
	<?php if ($this->params->get('googleFont')) : ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
			}
		</style>
	<?php endif; ?>
	<?php // Template color ?>
	<?php if ($this->params->get('templateColor')) : ?>
	<style type="text/css">
		body.site
		{
			border-top: 3px solid <?php echo $this->params->get('templateColor'); ?>;
			background-color: <?php echo $this->params->get('templateBackgroundColor'); ?>
		}
		a
		{
			color: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
	</style>
	<?php endif; ?>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="<?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">

	<!-- Body -->
	<div class="body">
		<!-- Header -->
		<header class="header header-inner" role="banner">

			<div class="header-top"">
				<div class="container">
					<div class="row">
						<div class="span2"></div>
						<div class="span10 margin-left-0">
							<img class="header-top-logo img-responsive" style="margin-bottom: -30px; margin-left: -10px; z-index: 10; position: relative;" src="../templates/hostgator/images/header-text-hostgator.png" alt=""/>
							<img class="header-top-logo img-responsive margin-tb-10" style="margin-left: -35px;" src="../templates/hostgator/images/header-text-coupon-best.png" alt=""/>
						</div>
					</div>


				</div>

			</div>
			<div class="header-bottom">
				<div class="container"  style="position: relative;">
					<di class="row-fluid">
						<div class="span2">
							<img style="position: relative; margin-top: -99px; bottom: 0;" class="header-top-logo img-responsive" src="../templates/hostgator/images/logo-dragon.png" alt=""/>
						</div>
						<div class="span9 clearfix">
							<?php if ($this->countModules('position-1')) : ?>
								<nav class="navigation margin-bottom-0" role="navigation">
									<jdoc:include type="modules" name="position-1" style="none" />
								</nav>
							<?php endif; ?>
						</div>
					</di>

				</div>
			</div>
		</header>
<!-------------------------------------------------------->
<!--		<jdoc:include type="modules" name="banner" style="xhtml" />-->
		<aritcle>
			<div class="wrapper-body">
				<div class="container">
					<div class="row">
						<div class="span8 col-xs-8">
							<div class="body-left" style="height: 500px;">
								<div class="span5" style="color: #fff; margin-top: 180px; margin-left: 130px;">
									<h2 style="font-size: 2.4vw;"><span style="color: #fdc04c;">HostGator</span> WebHosting</h2>
									<p style="text-align: justify; font-size: 0.9vw;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morlci non pretium metus, sit amet cursus nisi. Nam turpis, rhoncus curus iaculi a Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit amet cursus nisi. Nam turpis,</p>
								</div>
								<div class="span4 text-center" style="margin-left: 185px; margin-top: 30px; color: #fff;">
									<h2 style="font-size: 3em;">HGTR17</h2>
									<p style="font-size: 1.2em; font-weight: bold;">60 Days Free Money Back Guarantee</p>
								</div>
							</div>
						</div>
						<div class="span4 col-xs-4">
							<div class="row body-right">
								<ul>
									<li class="box-right-1">
										<div class="row margin-left-0">
											<div class="item-wrapper">
												<h2 class="margin-0">GTREKT46</h2>
												<p>60% off in your next purchase</p>
											</div>
										</div>
									</li>
									<li class="box-right-2">
										<div class="row margin-left-0 item-wrapper">
											<div class="item-wrapper">
												<h2 class="margin-0">MAMAMO14</h2>
												<p>60% off in your next purchase</p>
											</div>
										</div>
									</li>
									<li class="box-right-3">
										<div class="row margin-left-0 item-wrapper">
											<div class="item-wrapper">
												<h2 class="margin-0">RYUKSR2</h2>
												<p>60% off in your next purchase</p>
											</div>
										</div>
									</li>
									<li class="box-right-4">
										<div class="row margin-left-0 item-wrapper">
											<div class="item-wrapper">
												<h2 class="margin-0">MAMAMO15</h2>
												<p>60% off in your next purchase</p>
											</div>
										</div>
									</li>
									<li class="box-right-5">
										<div class="row margin-left-0 item-wrapper">
											<div class="item-wrapper">
												<h2 class="margin-0">NYAWRO7</h2>
												<p>60% off in your next purchase</p>
											</div>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
		</aritcle>
<!-------------------------------------------------------->
		<article>
			<div class="row text-center" style="background-color: #0171bc;" >
				<h1 style="font-weight: bold; color: #fff;">About <span style="color: #fdc04c;"> HostGator </span><span style="font-size: 18px;"> WebHosting</span></h1>
			</div>
		</article>
<!-------------------------------------------------------->
		<article>
			<div class="row body-box-bottom">
				<div class="container">
					<div class="row text-center body-box-bottom-note">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morlci non pretium metus, sit amet cursus nisi</p>
						<p>Nam turpis, rhoncus curus iaculi a</p>
					</div>
					<div class="row body-box-bottom-item">
						<div class="span4">
							<div class="item-img text-center">
								<img class="header-top-logo img-responsive" src="../templates/hostgator/images/icon-bottom-1.png" alt=""/>
							</div>
							<div class="item-text text-center">
								<h2>Lorem Lipsum</h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morlci non pretium metus, sit amet cursus nisi. Nam turpis, rhoncus curus iaculi a
								</p>
							</div>
						</div>
						<div class="span4 body-box-bottom-item">
							<div class="item-img text-center">
								<img class="header-top-logo img-responsive" src="../templates/hostgator/images/icon-bottom-2.png" alt=""/>
							</div>
							<div class="item-text text-center">
								<h2>Lorem Lipsum</h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morlci non pretium metus, sit amet cursus nisi. Nam turpis, rhoncus curus iaculi a
								</p>
							</div>
						</div>
						<div class="span4 body-box-bottom-item">
							<div class="item-img text-center">
								<img class="header-top-logo img-responsive" src="../templates/hostgator/images/icon-bottom-3.png" alt=""/>
							</div>
							<div class="item-text text-center">
								<h2>Lorem Lipsum</h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morlci non pretium metus, sit amet cursus nisi. Nam turpis, rhoncus curus iaculi a
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
<!-------------------------------------------------------->


	</div><!-- end body -->
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="row" style="margin-left:-30px;">
				<div class="span8">
					<div style="color: #fdc04c;">Site map | term of service | Privacy Policy</div>
					<div style="color: #fff;">Copyright &copy; <?php echo date('Y'); ?> <?php echo $sitename; ?></div>
				</div>
				<div class="span4 text-right">
					modsd
				</div>
			</div>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
