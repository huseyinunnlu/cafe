<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('settings.index')}}"><i class="fa fa-gear"></i> Settings</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('gallery.index')}}"><i class="fas fa-images"></i> Gallery</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('reservation.index')}}"><i class="fas fa-images"></i> Reservations</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('reservation.index')}}"><i class="fa fa-utensils"></i> Chefs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
