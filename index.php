<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Circle - Social Media Platform
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>

  <?php 
  $User_is_login = false;
  if(isset($_SESSION['USERNAME'])){
    $User_is_login = true;
    } else {
      $User_is_login = false;
    }
  ?>
 </head>
 <body class="bg-gray-900 text-gray-200 font-roboto">
  <header class="bg-gray-800 shadow-md">
   <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="text-2xl font-bold text-blue-400">
     Circle
    </div>
    <nav class="hidden md:flex space-x-4">
     <a class="text-gray-400 hover:text-blue-400" href="#">
      Home
     </a>
     <a class="text-gray-400 hover:text-blue-400" href="#">
      Profile
     </a>
     <a class="text-gray-400 hover:text-blue-400" href="#">
      Messages
     </a>
     <a class="text-gray-400 hover:text-blue-400" href="#">
      Notifications
     </a>
     <a class="text-gray-400 hover:text-blue-400" href="#">
      Settings
     </a>
    </nav>
    <div class="md:hidden">
     <button id="menu-toggle" class="text-gray-400 hover:text-blue-400 focus:outline-none">
      <i class="fas fa-bars">
      </i>
     </button>
    </div>
   </div>
   <nav id="mobile-menu" class="hidden md:hidden bg-gray-800">
    <a class="block px-4 py-2 text-gray-400 hover:text-blue-400" href="#">
     Home
    </a>
    <a class="block px-4 py-2 text-gray-400 hover:text-blue-400" href="#">
     Profile
    </a>
    <a class="block px-4 py-2 text-gray-400 hover:text-blue-400" href="#">
     Messages
    </a>
    <a class="block px-4 py-2 text-gray-400 hover:text-blue-400" href="#">
     Notifications
    </a>
    <a class="block px-4 py-2 text-gray-400 hover:text-blue-400" href="#">
     Settings
    </a>
   </nav>
  </header>
  <main class="container mx-auto px-4 py-6">
   <div class="flex flex-col md:flex-row md:space-x-6">
    <!-- Left Sidebar -->
    <aside class="w-full md:w-1/4 mb-6 md:mb-0">
     <div class="bg-gray-800 p-4 rounded-lg shadow-md">
      <h2 class="text-xl font-semibold mb-4">
       Friends
      </h2>
      <ul class="space-y-4">
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Friend 1
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Friend 2
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Friend 3
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Friend 4
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Friend 5
        </span>
       </li>
      </ul>
     </div>
    </aside>
    <!-- Main Content -->
    <section class="w-full md:w-2/4">
     <div class="bg-gray-800 p-4 rounded-lg shadow-md mb-6">
      <h2 class="text-xl font-semibold mb-4">
       Create Post
      </h2>
      <textarea class="w-full p-2 border border-gray-700 rounded-lg mb-4 bg-gray-700 text-gray-200" placeholder="What's on your mind?" rows="4"></textarea>
      <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">
       Post
      </button>
     </div>
     <div class="space-y-6">
      <div class="bg-gray-800 p-4 rounded-lg shadow-md">
       <div class="flex items-center space-x-4 mb-4">
        <div>
         <h3 class="text-gray-200 font-semibold">
          User 1
         </h3>
         <p class="text-gray-500 text-sm">
          2 hours ago
         </p>
        </div>
       </div>
       <p class="text-gray-400 mb-4">
        This is a sample post content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
       </p>
       <div class="flex space-x-4">
        <button class="text-gray-400 hover:text-blue-400">
         <i class="fas fa-thumbs-up">
         </i>
         Like
        </button>
        <button class="text-gray-400 hover:text-blue-400">
         <i class="fas fa-comment">
         </i>
         Comment
        </button>
        <button class="text-gray-400 hover:text-blue-400">
         <i class="fas fa-share">
         </i>
         Share
        </button>
       </div>
      </div>
      <div class="bg-gray-800 p-4 rounded-lg shadow-md">
       <div class="flex items-center space-x-4 mb-4">
        <div>
         <h3 class="text-gray-200 font-semibold">
          User 2
         </h3>
         <p class="text-gray-500 text-sm">
          5 hours ago
         </p>
        </div>
       </div>
       <p class="text-gray-400 mb-4">
        Another sample post content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
       </p>
       <div class="flex space-x-4">
        <button class="text-gray-400 hover:text-blue-400">
         <i class="fas fa-thumbs-up">
         </i>
         Like
        </button>
        <button class="text-gray-400 hover:text-blue-400">
         <i class="fas fa-comment">
         </i>
         Comment
        </button>
        <button class="text-gray-400 hover:text-blue-400">
         <i class="fas fa-share">
         </i>
         Share
        </button>
       </div>
      </div>
     </div>
    </section>
    <!-- Right Sidebar -->
    <aside class="w-full md:w-1/4">
     <div class="bg-gray-800 p-4 rounded-lg shadow-md">
      <h2 class="text-xl font-semibold mb-4">
       Trending
      </h2>
      <ul class="space-y-4">
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Trending Topic 1
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Trending Topic 2
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Trending Topic 3
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Trending Topic 4
        </span>
       </li>
       <li class="flex items-center space-x-4">
        <span class="text-gray-400">
         Trending Topic 5
        </span>
       </li>
      </ul>
     </div>
    </aside>
   </div>
  </main>
  <script>
   document.getElementById('menu-toggle').addEventListener('click', function() {
     var menu = document.getElementById('mobile-menu');
     if (menu.classList.contains('hidden')) {
       menu.classList.remove('hidden');
     } else {
       menu.classList.add('hidden');
     }
   });
  </script>
 </body>
</html>