<template>
    <Row>
        <Col span="12">col-12</Col>
        <Col span="12">col-12</Col>
    </Row>
    <br>
    <Row>
        <Col span="8">col-8</Col>
        <Col span="8">col-8</Col>
        <Col span="8">col-8</Col>
    </Row>
    <br>
    <Row>
        <Col span="6">col-6</Col>
        <Col span="6">col-6</Col>
        <Col span="6">col-6</Col>
        <Col span="6">col-6</Col>
    </Row>
</template>
<script>
    import {Row} from 'iview'
    import {Col} from 'iview'
    export default {
        components: {Row, Col}
    }
</script>