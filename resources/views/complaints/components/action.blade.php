<div class="btn-group">
    <a class="btn btn-sm btn-info" href="{{ route('complaint.show',$row->id) }}"><i class="bi bi-eye"></i></a>
    @if ($row->user_id == auth()->id())
        <a class="btn btn-sm btn-outline-warning" href="{{ route('complaint.edit',$row->id) }}"><i class="bi bi-pencil-fill"></i></a>
        <button type="button" class="btn btn-sm btn-outline-danger delete_item" onclick="deleteData('Complaint', '{{ route('complaint.delete') }}', {{ $row->id }})"><i class="bi bi-trash-fill"></i></button>
    @else
        <button type="button" class="btn btn-sm btn-outline-secondary">Disabled</button>
    @endif    
</div>