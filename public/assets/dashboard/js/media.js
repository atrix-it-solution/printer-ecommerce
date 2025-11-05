// media.js - Complete file

// Global variables
window.selectedImagePath = null;
window.selectedImageElement = null;
window.images = [];
window.currentImageType = null; // Add this

// Set image type function - make it globally available
window.setImageType = function(type) {
    window.currentImageType = type;
    console.log('Setting image type to:', type);
};

// Set as media image function - make it globally available
window.setAsMediaImage = function() {
    if (!window.selectedImagePath) {
        alert('Please select an image first!');
        return;
    }

    if (!window.currentImageType) {
        alert('Please specify image type first!');
        return;
    }

    const selectedPath = window.selectedImagePath;

    switch(window.currentImageType) {
        case 'site_icon':
            document.getElementById('siteIconImage').src = selectedPath;
            document.getElementById('siteIconContainer').style.display = 'block';
            document.getElementById('siteIconInput').value = selectedPath;
            break;
        case 'site_logo':
            document.getElementById('siteLogoImage').src = selectedPath;
            document.getElementById('siteLogoContainer').style.display = 'block';
            document.getElementById('siteLogoInput').value = selectedPath;
            break;
        case 'site_footer_logo':
            document.getElementById('footerLogoImage').src = selectedPath;
            document.getElementById('footerLogoContainer').style.display = 'block';
            document.getElementById('footerLogoInput').value = selectedPath;
            break;
        case 'featured_image':
            document.getElementById('featuredimageImage').src = selectedPath;
            document.getElementById('featuredimageContainer').style.display = 'block';
            document.getElementById('featuredimageInput').value = selectedPath;
            break;
    }

    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('uploadImageModal'));
    if (modal) {
        modal.hide();
    }
};

// Remove image function - make it globally available
window.removeImage = function(type) {
    switch(type) {
        case 'site_icon':
            document.getElementById('siteIconContainer').style.display = 'none';
            document.getElementById('siteIconImage').src = '';
            document.getElementById('siteIconInput').value = '';
            break;
        case 'site_logo':
            document.getElementById('siteLogoContainer').style.display = 'none';
            document.getElementById('siteLogoImage').src = '';
            document.getElementById('siteLogoInput').value = '';
            break;
        case 'site_footer_logo':
            document.getElementById('footerLogoContainer').style.display = 'none';
            document.getElementById('footerLogoImage').src = '';
            document.getElementById('footerLogoInput').value = '';
            break;
        case 'featured_image':
            document.getElementById('featuredimageContainer').style.display = 'none';
            document.getElementById('featuredimageImage').src = '';
            document.getElementById('featuredimageInput').value = '';
            break;
    }
};

// The rest of your existing media.js code remains the same...
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

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

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

function handleImageUpload(event) {
    const file = event.target.files[0];
    if (!file) return;
    
    const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    const maxSize = 4 * 1024 * 1024;

    if (!validTypes.includes(file.type)) {
        alert('Please select a valid image file (JPEG, PNG, GIF, WEBP)');
        return;
    }

    if (file.size > maxSize) {
        alert('Image size should be less than 4MB');
        return;
    }
    
    let reader = new FileReader();
    reader.onload = function(){
        let preview = document.getElementById('uploadPreview');
        preview.src = reader.result;
        preview.style.display = "block";
        uploadImage(file);
    };
    reader.readAsDataURL(file);
}

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
    
    fetch('/api/media')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            window.images = data;
            renderImageGallery();
        })
        .catch(error => {
            console.error('Error loading images:', error);
            gallery.innerHTML = `
                <div class="col-12 text-center py-4">
                    <div class="text-danger">
                        <i class="fas fa-exclamation-circle fa-2x mb-2"></i>
                        <p>Error loading images: ${error.message}</p>
                        <button class="mediabtn btn-sm" onclick="loadImages()">
                            <i class="fas fa-sync-alt me-1"></i>Retry
                        </button>
                    </div>
                </div>
            `;
        });
}

function uploadImage(file) {
    const formData = new FormData();
    formData.append('image', file);
    formData.append('_token', getCsrfToken());
    
    const uploadArea = document.querySelector('.upload-area');
    uploadArea.innerHTML = `
        <div class="text-center">
            <div class="spinner-border text-primary mb-3" role="status">
                <span class="visually-hidden">Uploading...</span>
            </div>
            <p>Uploading image...</p>
        </div>
    `;
    
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
        window.images.push(data);
        
        const galleryTab = document.getElementById('gallery-tab');
        const tab = new bootstrap.Tab(galleryTab);
        tab.show();
        
        renderImageGallery();
        
        setTimeout(() => {
            const newImageElement = document.querySelector(`.image-container[data-id="${data.id}"]`);
            if (newImageElement) {
                selectImage(newImageElement, data.url, data.original_name);
            }
        }, 100);
        
        uploadArea.innerHTML = `
            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
            <h5>Click to upload an image</h5>
            <p class="text-muted">or drag and drop your file here</p>
            <small class="text-muted">(JPEG, PNG, GIF, WEBP - Max 4MB)</small>
        `;
        
        initDragAndDrop();
    })
    .catch(error => {
        console.error('Error uploading image:', error);
        alert('Error uploading image: ' + error.message);
        
        uploadArea.innerHTML = `
            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
            <h5>Click to upload an image</h5>
            <p class="text-muted">or drag and drop your file here</p>
            <small class="text-muted">(JPEG, PNG, GIF, WEBP - Max 4MB)</small>
        `;
        
        initDragAndDrop();
    });
}

function selectImage(element, imageUrl, imageName) {
    document.querySelectorAll('.image-container').forEach(img => {
        img.classList.remove('selected');
    });
    
    element.classList.add('selected');
    window.selectedImagePath = imageUrl;
    window.selectedImageElement = element;
}

function renderImageGallery() {
    const gallery = document.getElementById('imageGallery');
    
    if (window.images.length === 0) {
        gallery.innerHTML = `
            <div class="col-12 text-center py-4">
                <i class="fas fa-image fa-3x text-muted mb-3"></i>
                <p class="text-muted">No images found. Upload some images to get started.</p>
            </div>
        `;
        return;
    }
    
    gallery.innerHTML = '';
    
    window.images.forEach(image => {
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

function deleteImage(id, button) {
    if (!confirm('Are you sure you want to delete this image permanently?')) return;
    
    const originalText = button.innerHTML;
    button.disabled = true;
    button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
    
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
        window.images = window.images.filter(img => img.id !== id);
        renderImageGallery();
        
        if (window.selectedImageElement && window.selectedImageElement.getAttribute('data-id') == id) {
            window.selectedImagePath = null;
            window.selectedImageElement = null;
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