import React, {useRef} from 'react'

const Attachment = ({onFileSelectError, onFileSelectSuccess}) => {
    const handleFileInput = (e) => {
        // handle validations
        const file = e.target.files[0]
        if (file.size/1024 > 1024)
            onFileSelectError({ error: "File size cannot exceed more than 1MB" });
        else onFileSelectSuccess(file);
    }

    return (
        <div>
            <input type="file" onChange={handleFileInput}/>
            <button type="button" className="btn btn-primary">UpFile</button>
        </div>
    )
}

export default Attachment;
