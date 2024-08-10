


<thead class="table table-bordered">
  <tr>
    
    
    <th scope="col" class="{{ request()->routeIs('home') ? 'activo' : '' }}"><a  href="{{ route('home') }}">Inicio</a></th> 
    <th scope="col" class="{{ request()->routeIs('personas') ? 'activo' : ''}}"><a href="{{ route('personas.index') }}">Personas</a></th> 
    <th scope="col" class="{{ request()->routeIs('contacto') ? 'activo' : ''}}"><a href="{{ route('contacto') }}">Contacto</a></th> 
    @guest
      <th>
        <a href="{{ route('login') }}">Login</a>
      </th> 
    @else
      <th>
        <a href="#" onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();">Cerrar Sesión</a>
      </th> 
    @endguest
  </tr>
</thead>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>




