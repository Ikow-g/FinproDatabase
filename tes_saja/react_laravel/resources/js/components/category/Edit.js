import React, { Component } from 'react';
import axios from 'axios';

export default class Edit extends Component {

    constructor(props) {
        super(props);
        this.onChangeCategoryName = this.onChangeCategoryName.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
        this.state = {
            category_name: ''
        }
    }

    componentDidMount() {
        axios.get('http://127.0.0.1:8000/category/edit/' + this.props.match.params.id)
            .then(response => {
                this.setState({ category_name: response.data.name });
            });
    }

    onChangeCategoryName(e) {
        this.setState({
            category_name: e.target.value
        });
    }

    onSubmit(e) {
        e.preventDefault();
        const category = {
            category_name: this.state.category_name
        }

        axios.put('http://127.0.0.1:8000/category/update/' + this.props.match.params.id, category)
            .then(res => console.log(res.data));
    }

    render() {
        return (
            <div>
                <form onSubmit={this.onSubmit}>
                    <div className="form-group">
                        <label htmlFor="category_name">Category</label>
                        <input type="text"
                            className="form-control"
                            id="category_name"
                            placeholder="Enter Category"
                            value={this.state.category_name}
                            onChange={this.onChangeCategoryName} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
        );
    }
}