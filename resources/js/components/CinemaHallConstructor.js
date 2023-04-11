import { Container } from 'postcss';
import React from 'react';
import ReactDOM from 'react-dom';

const cinemaHall = document.querySelector("#cinema-hall-constructor");
var rows = parseInt(cinemaHall.dataset.rows);
var seatsInRow = parseInt(cinemaHall.dataset.columns);

const seatsList = {
    columnCount: seatsInRow,
    columnWidth: '30px',
};

const rowsList = {
    height: '100%',
};

function getRowNumbers(rows) {
    var rowNumbers = [];
    for (let i = 1; i < (rows + 1); i++) {
        var newRowNumbers = rowNumbers.push(i);
    }

    const rowItems = rowNumbers.map((row) =>
        <li key={row} className="list-group-item text-muted my-2">
            {row}
        </li>
    );

    return (
        <div>
            <ul className="d-flex flex-column justify-content-between align-items-center" style={rowsList}>{rowItems}</ul>
        </div>
    );
}

function getSeats(seatsInRow, rows) {
    var seats = [];
    var rowNumbers = [];
    var totalSeats = seatsInRow * rows;

    for (let i = 1; i < (totalSeats + 1); i++) {
        var newSeats = seats.push(i);
    }

    for (let i = 0; i < seats.length; i++) {
        var newSeats = seats.push(seats.splice(0, seatsInRow));
    }

    for (let i = 1; i < (rows + 1); i++) {
        var newRowNumbers = rowNumbers.push(i);
    }

    for (let i = 0; i < rows; i++) {
        let seatItems = seats.map(function (row) {
            return row.map(function (seat) {
                return (
                    <li key={seat}>
                        {seat}
                        <input type="checkbox" className="form-check-input seat my-2" name="seats[i][seats]" value={seat} />
                    </li>
                )
            });
        });

        return rowNumbers.map(function (row) {
            return (
                <div>
                    <ul key={row} className="custom-list">{seatItems[i]}</ul>
                </div>
            )
        });
    };
};

function CinemaHallConstructor() {
    return (
        <div>
            <div className="d-flex flex-row justify-content-between mb-5">
                <div className="d-flex">
                    {getRowNumbers(rows)}
                </div>
                <div className="d-flex flex-column me-4">
                    {getSeats(seatsInRow, rows)}
                </div>
                <div className="d-flex">
                    {getRowNumbers(rows)}
                </div>
            </div>
        </div>
    );
}

export default CinemaHallConstructor;

if (document.getElementById('cinema-hall-constructor')) {
    ReactDOM.render(<CinemaHallConstructor />, document.getElementById('cinema-hall-constructor'));
}
