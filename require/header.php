<header class="font-Inter mt-28">
	<nav class="fixed top-0 left-0 w-full px-6 py-4 flex justify-between items-center bg-white bg-opacity-60 backdrop-blur-md">
		<!-- <a href="index.php" class="lg:ml-16 lg:mr-auto"><img src="public/logo.png" class="lg:h-10" alt="Logo de Mon Expert Propreté"></a> -->
		<object data="public/logo.svg" width="250" height="40"></object>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-gen-blue p-3">
				<svg class="block h-8 w-8 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden  lg:flex lg:gap-14">
			<li class="text-xl font-bold <?php if($page == "index"){echo 'border-b-2 border-gen-blue border-solid';};?>"><a href="index.php">Accueil</a></li>
			<li class="text-xl font-bold <?php if($page == "blog"){echo 'border-b-2 border-gen-blue border-solid';};?>"><a href="blog.php">Blog</a></li>
			<li><a href="#" class="download bg-gen-blue hover:bg-blue-800 rounded text-white ml-auto mr-2 text-center px-4 py-2 font-bold lg:mr-16 lg:px-5 lg:py-3 lg:text-xl sm:mr-8">Télécharger</a></li>
		</ul>
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm pt-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
			<object data="public/logo.svg" width="250" height="40"></object>
				<button class="navbar-close mr-0 ml-auto">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
						<a class="block p-4 text-2xl font-bold" href="index.php">Accueil</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-2xl font-bold" href="blog.php">Blog</a>
					</li>
				</ul>
			</div>
			<div class="mt-auto">
				<div class="pt-6">
					<a class="download block px-2 py-3 mb-10 text-center text-white font-bold bg-gen-blue text 2xl rounded" href="#">Télécharger</a>
				</div>
			</div>
            <script src="js/burger.js"></script>
		</nav>
	</div>
</header>