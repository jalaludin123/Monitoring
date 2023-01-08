<object data="{{ asset('file/perizinan/' . $perizinan->file_perizinan) }}" type="application/pdf" width="100%"
    height="100%">
    <iframe src="{{ asset('file/perizinan/' . $perizinan->file_perizinan) }}" width="100%" height="100%"
        style="border: none;">
        <p>
            Your browser does not support PDFs.
            <a href="{{ asset('file/perizinan/' . $perizinan->file_perizinan) }}">Download the PDF</a>
            .
        </p>
    </iframe>
</object>
