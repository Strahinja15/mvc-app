   <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <ul class="navbar-nav ms-auto">
           <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url('/');?>">Home</a>
           </li>
           <?php if(is_logged_in()): ?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url('/dashboard');?>">Dashboard</a>
           </li>
           <?php endif; ?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url('/about');?>">About</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url('/contact');?>">Contact</a>
           </li>
           <?php if(!is_logged_in()): ?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url('login');?>">Login</a>
           </li>
           <?php endif; ?>
            <?php if(!is_logged_in()):?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url('register');?>">Register</a>
           </li>
           <?php endif; ?>
       </ul>
   </nav>