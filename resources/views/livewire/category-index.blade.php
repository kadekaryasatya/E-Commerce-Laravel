<div>

    <livewire:category-create></livewire:category-create>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Kateori</th>
                        <th class="text-center">Edit</th>
                        </tr>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
            </tbody>
        </table>
    </div>
</div>
