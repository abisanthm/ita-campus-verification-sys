
    //Define an adapter to upload the files
    class MyUploadAdapter {
       constructor(loader) {
          this.loader = loader;

          // URL where to send files.
          this.url = '{{ route('upload-image') }}';

          //
       }
       // Starts the upload process.
       upload() {
          return this.loader.file.then(
             (file) =>
                new Promise((resolve, reject) => {
                   this._initRequest();
                   this._initListeners(resolve, reject, file);
                   this._sendRequest(file);
                })
          );
       }
       // Aborts the upload process.
       abort() {
          if (this.xhr) {
             this.xhr.abort();
          }
       }
       // Initializes the XMLHttpRequest object using the URL passed to the constructor.
       _initRequest() {
          const xhr = (this.xhr = new XMLHttpRequest());
          xhr.open("POST", this.url, true);
          xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
          xhr.responseType = "json";
       }
       // Initializes XMLHttpRequest listeners.
       _initListeners(resolve, reject, file) {
          const xhr = this.xhr;
          const loader = this.loader;
          const genericErrorText = `Couldn't upload file: ${file.name}.`;
          xhr.addEventListener("error", () => reject(genericErrorText));
          xhr.addEventListener("abort", () => reject());
          xhr.addEventListener("load", () => {
             const response = xhr.response;
             if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
             }

             resolve({
                default: response.url,
             });
          });
          if (xhr.upload) {
             xhr.upload.addEventListener("progress", (evt) => {
                if (evt.lengthComputable) {
                   loader.uploadTotal = evt.total;
                   loader.uploaded = evt.loaded;
                }
             });
          }
       }
       // Prepares the data and sends the request.
       _sendRequest(file) {
          // Prepare the form data.
          const data = new FormData();
          data.append("upload", file);
          this.xhr.send(data);
       }
       // ...
    }

    function SimpleUploadAdapterPlugin(editor) {
       editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
          // Configure the URL to the upload script in your back-end here!
          return new MyUploadAdapter(loader);
       };
    }

    //Initialize the ckeditor
    ClassicEditor.create(document.querySelector("#body"), {
       extraPlugins: [SimpleUploadAdapterPlugin],
    }).catch((error) => {
       console.error(error);
    });


