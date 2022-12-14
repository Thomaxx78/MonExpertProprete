<header class="font-Inter">
	<nav class="relative px-4 py-4 flex justify-between items-center bg-white">
	<a href="index.php" class="lg:ml-16 lg:mr-auto w-64 "><img src="public/logo.png" alt="Logo de Mon Expert Propreté"></a>
		<!-- <object class="backHome" data="public/logo.svg" width="250" height="40"></object> -->
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-gen-blue p-3">
				<svg class="block h-8 w-8 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden  lg:flex lg:gap-10 lg:items-center">
			<li class="block p-4 text-xl font-semi-bold"><a href="gestion.php?gestion=faq" <?php if($gestion=="question"){echo 'class=""';}?>>Modifier la faq</a></li>
			<li class="block p-4 text-xl font-semi-bold"><a href="gestion.php?gestion=blog" <?php if($gestion=="article"){echo 'class=""';}?>>Modifier le blog</a></li>
			<li><a href="database/deco.php" class=" rounded text-gen-blue border-solid border-2 border-gen-blue ml-auto mr-4 text-center px-2 py-1 font-semi-bold lg:mr-8 lg:px-4 lg:py-2 text-xl sm:mr-8">Déconnexion</a></li>
		</ul>
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm pt-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
			<a href="index.php" class="lg:ml-16 lg:mr-auto w-64 "><img src="public/logo.png" alt="Logo de Mon Expert Propreté"></a>
            <!-- <object data="public/logo.svg" width="250" height="40"></object> -->
				<button class="navbar-close mr-0 ml-auto">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
                        <a class="block  p-4 text-2xl" href="gestion.php?gestion=faq" <?php if($gestion=="question"){echo 'class=""';}?>>Modifier la faq</a>
					</li>
					<li class="mb-1">
                        <a class="block  p-4 text-2xl mb-4" href="gestion.php?gestion=blog" <?php if($gestion=="article"){echo 'class=""';}?>>Modifier le blog</a></li>
					</li>
                    <li class="mb-1">
                        <a href="database/deco.php" class="text-2xl text-gen-blue rounded border-solid border-2 border-gen-blue px-2 py-1 ml-4">Déconnexion</a>
                    </li>
				</ul>
			</div>
			<div class="mt-auto">
				<div class="pt-6">
					<a class="download block px-2 py-3 mb-10 text-center text-white font-bold bg-gen-blue hover:bg-blue-900 text 2xl rounded" href="#">Télécharger</a>
				</div>
			</div>
            <script src="js/burger.js"></script>
		</nav>
</header>