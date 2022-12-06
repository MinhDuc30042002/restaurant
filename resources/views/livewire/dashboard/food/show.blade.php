<a class="w-full flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row hover:bg-gray-100">
    <img class="object-cover w-full rounded-t-lg h-full md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
        src="{{asset('storage/upload/'. $data->image)}}" onerror="this.src='https://dashboard-api.flyfood.vn/system/product_images/4014/image.jpg'" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->name }}</h5>
        <p class="mb-3 font-normal text-gray-700">Giá: <b> {{ number_format($data->price, 0, '', '.') }} đ </b></p>
        <p class="mb-3 font-normal text-gray-700">Số lượng có sẳn: <b>{{ $data->available_quantity }}</b></p>
        <p class="mb-3 font-normal text-gray-700">Mã sản phẩm: <b>{{ $data->id }}</b></p>
    </div>
</a>
