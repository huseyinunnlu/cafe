<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('settings.index')}}">Settings</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('gallery.index')}}">Gallery</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('reservation.index')}}">>Reservations</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('chef.index')}}">>Chefs</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('menu.index')}}">Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
