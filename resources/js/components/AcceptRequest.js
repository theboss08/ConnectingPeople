import React from 'react';
import ReactDOM from 'react-dom';
import Button from '@material-ui/core/Button';

class AcceptRequest extends React.Component {

    componentDidMount(){
    	
    }

    handleClick = event => {
    	axios.post('/accept_request', {
    		user_id_1 : this.props.user_id_1,
    		user_id_2 : this.props.user_id_2,
    	}).then(res => {

    	})
    }

    render(){
        return (
        	<>
        	<Button onClick={this.handleClick} variant="contained" color="primary">Accept Request</Button>
        	</>
        );
    }
}

export default AcceptRequest;

if (document.getElementById('accept_request')) {
    ReactDOM.render(<AcceptRequest />, document.getElementById('accept_request'));
}
