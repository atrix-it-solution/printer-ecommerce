@extends('dashboard.layouts.dashboard-main-layout')

@section('title', 'Dashboard Settings')

@section('dashboard-content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Site Settings</h1>
    </div>

   @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show auto-dismiss" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

    <div class="card shadow">
        <div class="card-body">
            <!-- Fixed form action route -->
            <form action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="site_title" class="form-label">Site Title</label>
                            <input type="text" class="form-control" id="site_title" name="site_title" 
                                   value="{{ old('site_title', $setting->site_title ?? '') }}" placeholder="Enter site title">
                            <div class="form-text">This will appear in browser tabs and as the site name.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" 
                                   value="{{ old('contact_email', $setting->contact_email ?? '') }}" placeholder="Enter contact email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_phone" class="form-label">Contact Phone</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" 
                                   value="{{ old('contact_phone', $setting->contact_phone ?? '') }}" placeholder="Enter contact phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter company address">{{ old('address', $setting->address ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                             
                                    <label class="form-label">Site Icon</label>
                                    <div style=" margin-top:10px; color:blue;">
                                    <div id="setFeaturedBtnn" type="button" class="classsetFeaturedBtnn" data-bs-toggle="modal" data-bs-target="#uploadImageModal" >
                                        Set Site Icon
                                    </div>
                                    </div>
                                    <!-- Site Icon preview (hidden at first) -->
                                    <div id="featuredImageContainer" style="display:none; margin-top:10px;">
                                        <div class="frontend-item d-inline-block position-relative">
                                        <img id="featuredImage" src="" class="img-fluid rounded border" style="max-height:200px;">
                                        <button type="button" class="btn btn-danger btn-sm btn-remove position-absolute top-0 end-0 m-2"
                                                onclick="removeFeaturedImage()">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        </div>
                                    </div>
                                
                            <!-- <label for="site_icons" class="form-label">Site Icon (Favicon)</label>
                            <input type="file" class="form-control" id="site_icons" name="site_icons" accept=".ico,.png">
                            @if(isset($setting) && $setting->site_icons)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $setting->site_icons) }}" alt="Site Icon" class="img-thumbnail mt-1" style="max-height: 50px;">
                                    <br>
                                   
                                    
                                </div>
                            @endif
                            <div class="form-text">Recommended: 32x32 pixels, .ico or .png format</div> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="site_logo" class="form-label">Site Logo</label>
                            <input type="file" class="form-control" id="site_logo" name="site_logo" accept="image/*">
                            @if(isset($setting) && $setting->site_logo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $setting->site_logo) }}" alt="Site Logo" class="img-thumbnail mt-1" style="max-height: 50px;">
                                </div>
                            @endif
                            <div class="form-text">Recommended: 200x50 pixels, transparent background</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="site_footer_logo" class="form-label">Footer Logo</label>
                            <input type="file" class="form-control" id="site_footer_logo" name="site_footer_logo" accept="image/*">
                            @if(isset($setting) && $setting->site_footer_logo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $setting->site_footer_logo) }}" alt="Footer Logo" class="img-thumbnail mt-1" style="max-height: 50px;">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                </div>


                @include('dashboard.common.media.index')
            </form>
        </div>
    </div>
</div>
<script>
    // Auto-dismiss alerts after 10 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.auto-dismiss');
        
        alerts.forEach(function(alert) {
            setTimeout(function() {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 10000);
        });
    });

    // Global variables
    let selectedImagePath = null;
    let selectedImageElement = null;
    let images = [];

    // Initialize when document is ready
    document.addEventListener('DOMContentLoaded', function () {
        // Modal
        const modal = document.getElementById('uploadImageModal');
        if (modal) {
            modal.addEventListener('shown.bs.modal', function () {
                loadImages();
            });
        }

        // Drag & Drop
        initDragAndDrop();
    });

    // Get CSRF token from meta tag
    function getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    }

    // Initialize drag and drop functionality
    function initDragAndDrop() {
        const uploadArea = document.querySelector('.upload-area');
        if (!uploadArea) return;

        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#6c5ce7';
            this.style.backgroundColor = '#f0f0ff';
        });
        
        uploadArea.addEventListener('dragleave', function() {
            this.style.borderColor = '#ccc';
            this.style.backgroundColor = '#f9f9f9';
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#ccc';
            this.style.backgroundColor = '#f9f9f9';
            
            if (e.dataTransfer.files.length) {
                document.getElementById('imageInput').files = e.dataTransfer.files;
                handleImageUpload({ target: document.getElementById('imageInput') });
            }
        });
    }

    // Handle image upload
    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        // Validate file
        const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        const maxSize = 4 * 1024 * 1024; // 4MB

        if (!validTypes.includes(file.type)) {
            alert('Please select a valid image file (JPEG, PNG, GIF, WEBP)');
            return;
        }

        if (file.size > maxSize) {
            alert('Image size should be less than 4MB');
            return;
        }
        
        // Show preview
        let reader = new FileReader();
        reader.onload = function(){
            let preview = document.getElementById('uploadPreview');
            preview.src = reader.result;
            preview.style.display = "block";
            
            // Auto-upload the image
            uploadImage(file);
        };
        reader.readAsDataURL(file);
    }

    // Load images from server
    function loadImages() {
        const gallery = document.getElementById('imageGallery');
        gallery.innerHTML = `
            <div class="col-12 text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading images...</p>
            </div>
        `;
        
        // Use the new API endpoint
        fetch('/api/media')
            .then(response => {
                // console.log('Response status:', response.status);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // console.log('Loaded images:', data);
                images = data;
                renderImageGallery();
            })
            .catch(error => {
                console.error('Error loading images:', error);
                gallery.innerHTML = `
                    <div class="col-12 text-center py-4">
                        <div class="text-danger">
                            <i class="fas fa-exclamation-circle fa-2x mb-2"></i>
                            <p>Error loading images: ${error.message}</p>
                            <button class="btn btn-primary btn-sm" onclick="loadImages()">
                                <i class="fas fa-sync-alt me-1"></i>Retry
                            </button>
                        </div>
                    </div>
                `;
            });
    }

    // Upload image to server
    function uploadImage(file) {
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', getCsrfToken());
        
        // Show uploading indicator
        const uploadArea = document.querySelector('.upload-area');
        uploadArea.innerHTML = `
            <div class="text-center">
                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="visually-hidden">Uploading...</span>
                </div>
                <p>Uploading image...</p>
            </div>
        `;
        
        // Use the new API endpoint
        fetch('/api/media/upload', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    throw new Error(err.error || 'Upload failed');
                });
            }
            return response.json();
        })
        .then(data => {
            // Add to images array
            images.push(data);
            
            // Switch to media library tab
            const galleryTab = document.getElementById('gallery-tab');
            const tab = new bootstrap.Tab(galleryTab);
            tab.show();
            
            // Render the gallery
            renderImageGallery();
            
            // Select the newly uploaded image
            setTimeout(() => {
                const newImageElement = document.querySelector(`.image-container[data-id="${data.id}"]`);
                if (newImageElement) {
                    selectImage(newImageElement, data.url, data.original_name);
                }
            }, 100);
            
            // Reset upload area
            uploadArea.innerHTML = `
                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                <h5>Click to upload an image</h5>
                <p class="text-muted">or drag and drop your file here</p>
                <small class="text-muted">(JPEG, PNG, GIF, WEBP - Max 4MB)</small>
            `;
            
            // Reinitialize drag and drop
            initDragAndDrop();
        })
        .catch(error => {
            console.error('Error uploading image:', error);
            alert('Error uploading image: ' + error.message);
            
            // Reset upload area on error
            uploadArea.innerHTML = `
                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                <h5>Click to upload an image</h5>
                <p class="text-muted">or drag and drop your file here</p>
                <small class="text-muted">(JPEG, PNG, GIF, WEBP - Max 4MB)</small>
            `;
            
            // Reinitialize drag and drop
            initDragAndDrop();
        });
    }

    // Select image function
    function selectImage(element, imageUrl, imageName) {
        // Remove selected class from all images
        document.querySelectorAll('.image-container').forEach(img => {
            img.classList.remove('selected');
        });
        
        // Add selected class to clicked image
        element.classList.add('selected');
        
        // Update selected image
        selectedImagePath = imageUrl;
        selectedImageElement = element;
        
        // Show preview
        // const preview = document.getElementById('selectedImagePreview');
        // preview.src = imageUrl;
        // preview.style.display = "block";
    }

    // Render image gallery
    function renderImageGallery() {
        const gallery = document.getElementById('imageGallery');
        
        if (images.length === 0) {
            gallery.innerHTML = `
                <div class="col-12 text-center py-4">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No images found. Upload some images to get started.</p>
                </div>
            `;
            return;
        }
        
        gallery.innerHTML = '';
        
        images.forEach(image => {
            const col = document.createElement('div');
            col.classList.add('col-md-3', 'mb-3');
            
            col.innerHTML = `
                <div class="image-container" data-id="${image.id}" onclick="selectImage(this, '${image.url}', '${image.original_name}')">
                    <img src="${image.url}" 
                        alt="${image.original_name}"
                        class="img-fluid">
                    <div class="checkmark">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="overlay">
                        <button type="button" class="btn btn-danger btn-sm" onclick="event.stopPropagation(); deleteImage(${image.id}, this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <small class="text-muted d-block text-center mt-1">${image.original_name}</small>
            `;
            
            gallery.appendChild(col);
        });
    }

    // Delete image
    function deleteImage(id, button) {
        if (!confirm('Are you sure you want to delete this image permanently?')) return;
        
        // Show loading state on the button
        const originalText = button.innerHTML;
        button.disabled = true;
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        
        // Use the new API endpoint
        fetch(`/api/media/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': getCsrfToken(),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    throw new Error(err.error || 'Delete failed');
                });
            }
            return response.json();
        })
        .then(data => {
            // Remove image from the gallery
            images = images.filter(img => img.id !== id);
            renderImageGallery();
            
            // If the deleted image was selected, clear the selection
            if (selectedImageElement && selectedImageElement.getAttribute('data-id') == id) {
                document.getElementById('selectedImagePreview').style.display = "none";
                selectedImagePath = null;
                selectedImageElement = null;
            }
            
            alert('Image deleted successfully!');
        })
        .catch(error => {
            console.error('Error deleting image:', error);
            alert('Error deleting image: ' + error.message);
        })
        .finally(() => {
            button.disabled = false;
            button.innerHTML = originalText;
        });
    }

    // Set as featured image
    function setAsFeaturedimage() {
        if (!selectedImagePath) {
            alert('Please select an image first!');
            return;
        }

        const featuredContainer = document.getElementById('featuredImageContainer');
        const featuredImage = document.getElementById('featuredImage');
        const setBtn = document.getElementById('setFeaturedBtnn');

        // Create hidden input if it doesn't exist
        let featuredInput = document.getElementById('featuredImageInput');
        if (!featuredInput) {
            featuredInput = document.createElement('input');
            featuredInput.type = 'hidden';
            featuredInput.name = 'site_icon'; // This should match your database field
            featuredInput.id = 'featuredImageInput';
            document.querySelector('form').appendChild(featuredInput);
        }

        if (featuredContainer && featuredImage && featuredInput) {
            featuredImage.src = selectedImagePath;
            featuredContainer.style.display = 'block';
            featuredInput.value = selectedImagePath; // Store the URL
        }

        if (setBtn) {
            setBtn.style.display = 'none';
        }

        const modalEl = document.getElementById('uploadImageModal');
        if (modalEl) {
            let modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.hide();
        }
    }

    function removeFeaturedImage() {
        const featuredContainer = document.getElementById('featuredImageContainer');
        const featuredImage = document.getElementById('featuredImage');
        const setBtn = document.getElementById('setFeaturedBtnn');
        const featuredInput = document.getElementById('featuredImageInput');

        if (featuredContainer && featuredImage) {
            featuredContainer.style.display = 'none';
            featuredImage.src = '';
        }

        if (featuredInput) {
            featuredInput.value = '';
        }

        selectedImagePath = null;
        selectedImageElement = null;

        if (setBtn) {
            setBtn.style.display = 'inline-block';
        }
    }
</script>

@endsection