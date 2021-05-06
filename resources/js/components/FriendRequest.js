import React from 'react';
import ReactDOM from 'react-dom';
import Button from '@material-ui/core/Button';
import Backdrop from '@material-ui/core/Backdrop';
import CircularProgress from '@material-ui/core/CircularProgress';
import axios from 'axios';

export default class FriendRequest extends React.Component {

    constructor(props){
        super(props);
        this.state = {
            button : true,
            backdrop : false,
        };
    }

    //to be taken care of

    handleClick = event => {
        this.setState({backdrop : true});
        axios.post('/notification', {
            'sent_by' : parseInt(this.props.sent_by),
            'sent_to' : parseInt(this.props.sent_to),
        }).then(res => {
            this.setState({backdrop : false, button : false});
        })
    }

    render(){
        return(
            <div>
             <Backdrop style={{zIndex : 100}} open={this.state.backdrop}>
        <CircularProgress color="inherit" />
      </Backdrop>
            {this.state.button ? <Button onClick={this.handleClick} variant="contained" color="primary">Send Friend Request</Button> : ''}
            </div>
        );
    }
}

if (document.getElementById('friend_button')) {
    const propsContainer = document.getElementById('friend_button');
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(<FriendRequest {...props} />, document.getElementById('friend_button'));
}