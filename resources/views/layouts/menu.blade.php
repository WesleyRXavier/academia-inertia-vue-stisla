<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('home')  }}">
         <i class=" fas fa-home"></i><span>Inicio</span>
     </a>
 </li>
 @if(auth()->user()->tipo == 'aluno')
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
   <a class="nav-link" href="">
        <i class=" fas fa-building"></i><span>Meu Treino</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="">
         <i class="fas fa-file-invoice-dollar"></i><span>Finanças</span>
     </a>
 </li>

 @else
 <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="">
         <i class=" fas fa-building"></i><span>Cadastro treino</span>
     </a>
 </li>

@endif