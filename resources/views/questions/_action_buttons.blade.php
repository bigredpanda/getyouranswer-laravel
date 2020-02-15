<div class="ml-auto actions">
    @can('update', $question)
        <a href="{{ route('questions.edit', $question->id) }}"
           class="btn btn-outline-info btn-sm">
            Edit
        </a>
    @endcan

    @can('delete', $question)
        <form action="{{ route('questions.destroy', $question->id) }}"
              class="form-delete" method="POST">
            @csrf {{method_field('DELETE')}}

            <button class="btn btn-outline-danger btn-sm"
                    onclick="return confirm('Are you sure>'); " type="submit">
                Delete
            </button>
        </form>
    @endcan
</div>