<div class="ml-auto actions">
    @if(auth()->user()->can('update-question', $question))
        <a href="{{ route('questions.edit', $question->id) }}"
           class="btn btn-outline-info btn-sm">
            Edit
        </a>
    @endif

    @if(auth()->user()->can('delete-question', $question))
        <form action="{{ route('questions.destroy', $question->id) }}"
              class="form-delete" method="POST">
            @csrf {{method_field('DELETE')}}

            <button class="btn btn-outline-danger btn-sm"
                    onclick="return confirm('Are you sure>'); " type="submit">
                Delete
            </button>
        </form>
    @endif
</div>