import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import ThumbUpOutlinedIcon from '@material-ui/icons/ThumbUpOutlined';
import ThumbDownOutlinedIcon from '@material-ui/icons/ThumbDownOutlined';
import ThumbUpIcon from '@material-ui/icons/ThumbUp';
import ThumbDownIcon from '@material-ui/icons/ThumbDown';

export default class LikeButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            liked : false,
            disliked : false,
            text : true,
        };
    }

    componentDidMount() {
        if(this.props.liked > 0){
            this.setState({liked : true});
        }
        else if(this.props.disliked > 0){
            this.setState({disliked : true});
        }
        if(this.props.text_post === "true"){
            this.setState({text : true});
        }
        else this.setState({text : false});
    }

    handleLike = async (e) => {
        if(this.state.disliked) {
            this.setState({liked : true, disliked : false});
            if(this.state.text){
                let req = await axios.post('/like/text', {
                    like : true,
                    dislike : false,
                    post_id : this.props.post_id,
                });
            }
            else {
                let req = await axios.post('/like/image', {
                    like : true,
                    dislike : false,
                    post_id : this.props.post_id,
                })
            }
        }
        else {
            if(this.state.liked){
                this.setState({liked : false});
                if(this.state.text){
                    let req = await axios.post('/like/text', {
                        like : false,
                        post_id : this.props.post_id,
                    });
                }
                else {
                    let req = await axios.post('/like/image', {
                        like : false,
                        post_id : this.props.post_id,
                    })
                }
            }
            else {
                this.setState({liked : true});
                if(this.state.text){
                    let req = await axios.post('/like/text', {
                        like : true,
                        post_id : this.props.post_id,
                    });
                }
                else {
                    let req = await axios.post('/like/image', {
                        like : true,
                        post_id : this.props.post_id,
                    })
                }
            }
        }
        location.reload();
    }

    handleDislike = async (e) => {
        if(this.state.liked){
            this.setState({liked : false, disliked : true});
            if(this.state.text) {
                let req = await axios.post('/like/text', {
                    like : false,
                    dislike : true,
                    post_id : this.props.post_id,
                })
            }
            else {
                let req = await axios.post('/like/image', {
                    like : false,
                    dislike : true,
                    post_id : this.props.post_id,
                })
            }
        }
        else {
            if(this.state.disliked){
                this.setState({disliked : false});
                if(this.state.text){
                    let req = await axios.post('/like/text', {
                        dislike : false,
                        post_id : this.props.post_id,
                    })
                }
                else {
                    let req = await axios.post('/like/image', {
                        dislike : false,
                        post_id : this.props.post_id,
                    })
                }
            }
            else {
                this.setState({disliked : true});
                if(this.state.text){
                    let req = await axios.post('/like/text', {
                        dislike : true,
                        post_id : this.props.post_id,
                    })
                }
                else {
                    let req = await axios.post('/like/image', {
                        dislike : true,
                        post_id : this.props.post_id,
                    })
                }
            }
        }
        location.reload();
    }

    render(){
        return(
            <>
            {this.state.liked ? <ThumbUpIcon onClick={ this.handleLike } style={{marginRight : "18px", cursor : "pointer"}} /> : <ThumbUpOutlinedIcon onClick={this.handleLike} style={{marginRight : "18px", cursor : "pointer"}} />}
            {this.state.disliked ? <ThumbDownIcon onClick={this.handleDislike} style={{cursor : "pointer"}} /> : <ThumbDownOutlinedIcon onClick={this.handleDislike} style={{cursor : "pointer"}} />}
            </>
        )
    }
}

if (document.getElementById('like_button')) {
    const propsContainer = document.getElementById('like_button');
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(<LikeButton {...props} />, document.getElementById('like_button'));
}