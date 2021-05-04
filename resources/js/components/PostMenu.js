import React from 'react';
import ReactDOM from 'react-dom';
import Menu from '@material-ui/core/Menu';
import MenuItem from '@material-ui/core/MenuItem';

export default function PostMenu () {
    const [anchorEl, setAnchorEl] = React.useState(null);

  const handleClick = (event) => {
    setAnchorEl(event.currentTarget);
  };

  const handleClose = (event) => {
    setAnchorEl(null);
  };

    return(
        <>
        <a style={{textDecoration : 'underline', cursor : 'pointer', marginLeft : "10px"}} aria-controls="simple-menu" aria-haspopup="true" onClick={handleClick}>
        Add Post
      </a>
      <Menu
        id="simple-menu"
        anchorEl={anchorEl}
        keepMounted
        open={Boolean(anchorEl)}
        onClose={handleClose}
      >
        <MenuItem name="text" onClick={() => window.location.href = "/post/text"}>Add Text Post</MenuItem>
        <MenuItem name="image" onClick={() => window.location.href = "/post/image"}>Add Image Post</MenuItem>
        {/* <MenuItem name="video" onClick={() => window.location.href = "/post/video"}>Add Video Post</MenuItem> */}
      </Menu>
        </>
    );
}

if (document.getElementById('postMenu')) {
    ReactDOM.render(<PostMenu />, document.getElementById('postMenu'));
}